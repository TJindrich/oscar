<?php

declare(strict_types=1);

namespace App\UI\Home;

use App\Forms\UploadFormFactory;
use App\Models\OscarModel;
use Nette;


final class HomePresenter extends Nette\Application\UI\Presenter
{
	public function __construct
	(
		private UploadFormFactory $UploadFormFactory,
		private OscarModel $OscarModel
	)
	{
	}

	public function createComponentUploadForm(): Nette\Application\UI\Form
	{
		$form = $this->UploadFormFactory->create();

		$form->onSuccess[] = [$this, 'uploadFormSuccess'];

		return $form;
	}

	public function uploadFormSuccess(Nette\Application\UI\Form $form, Nette\Utils\ArrayHash $values): void
	{
		$this->template->result = $this->OscarModel->process($values);
		$this->redrawControl('oscar');
	}
}
