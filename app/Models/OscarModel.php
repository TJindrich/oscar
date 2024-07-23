<?php

declare(strict_types=1);

namespace App\Models;

use Nette\Utils\ArrayHash;
use OpenSpout\Reader\CSV\Reader;

class OscarModel
{
	public function process(ArrayHash $inputFiles): array
	{
		$result = [];
		$oscarsByYear = [];
		$moviesDoubleOscars = [];

		foreach ($inputFiles['files'] as $file)
		{
			assert($file instanceof \Nette\Http\FileUpload);
			if($file->isOk())
			{
				$isMale = !str_contains($file->getSanitizedName(), 'female');

				$reader = new Reader();
				$reader->open($file->getTemporaryFile());

				foreach ($reader->getSheetIterator() as $sheet)
				{
					foreach ($sheet->getRowIterator() as $row)
					{
						$cells = $row->getCells();
						if($cells[0]->getValue() === 'Index')
						{
							continue;
						}

						if($isMale)
						{
							$oscarsByYear[trim($cells[1]->getValue())]['male'] = ['name' => $cells[3]->getValue(), 'age' => trim($cells[2]->getValue()), 'movie' => $cells[4]->getValue()];
						}
						else
						{
							$oscarsByYear[trim($cells[1]->getValue())]['female'] = ['name' => $cells[3]->getValue(), 'age' => trim($cells[2]->getValue()), 'movie' => $cells[4]->getValue()];
						}
					}
				}
				$reader->close();
			}
		}

		foreach($oscarsByYear as $year => $oscars)
		{
			if($oscars['male']['movie'] === $oscars['female']['movie'])
			{
				$moviesDoubleOscars[$year]['movie'] = $oscars['male']['movie'];
				$moviesDoubleOscars[$year]['male'] = $oscars['male']['name'];
				$moviesDoubleOscars[$year]['female'] = $oscars['female']['name'];
			}
		}
		asort($moviesDoubleOscars);
		$result[] = $oscarsByYear;
		$result[] = $moviesDoubleOscars;
bdump($result);
		return $result;
	}
}