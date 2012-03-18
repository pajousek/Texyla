<?php

use Nette\Environment;

/**
 * Base class for all application presenters
 */
abstract class BasePresenter extends \Nette\Application\UI\Presenter
{
	/** @var bool */
	public $oldLayoutMode = false;



	/**
	 * Texyla loader factory
	 * @return TexylaLoader
	 */
	protected function createComponentTexyla()
	{
		$baseUri = $this->getHttpRequest()->getUrl()->getBaseUrl();
		$texyla = new TexylaLoader($baseUri);

		$texyla->filters[] = new WebLoader\VariablesFilter(array(
			"baseUri" => $baseUri,
			"previewPath" => $this->link("Texyla:preview"),
			"filesPath" => $this->link("Texyla:listFiles"),
			"filesUploadPath" => $this->link("Texyla:upload"),
			"filesMkDirPath" => $this->link("Texyla:mkDir"),
			"filesRenamePath" => $this->link("Texyla:rename"),
			"filesDeletePath" => $this->link("Texyla:delete"),
		));

		$texyla->addFile(WWW_DIR . "/js/texyla-init.js");

		return $texyla;
	}
}
