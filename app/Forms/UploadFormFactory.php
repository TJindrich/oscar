<?php

declare(strict_types=1);

namespace App\Forms;

use Nette\Application\UI\Form;

class UploadFormFactory
{
	public function create(): Form
	{
		$form = new Form;

		$form->addMultiUpload('files', 'Soubory')
			->setRequired()
			->addRule(Form::Count, 'Musí být nahrány 2 soubory', 2);

		$form->addSubmit('submit', 'Nahrát');

		return $form;
	}
}