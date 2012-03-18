<?php

use Nette\Application\UI\Form;

/**
 * Homepage presenter
 */
class HomepagePresenter extends BasePresenter
{
	/**
	 * Example form factory
	 * @return AppForm
	 */
	protected function createComponentExampleForm()
	{
		$form = new Form();

		$form->addTextarea("text", "Text", 110, 20)
			->getControlPrototype()->class("texyla");

		$form->addSubmit("s", "Submit");

		return $form;
	}

}
