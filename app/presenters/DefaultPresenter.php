<?php

/**
 * SACT
 *
 * @copyright  Copyright (c) 2010 Igor Hlina
 * @package    Sact
 */

use	Models\Content,
	Components\Navigation;


/**
 * Default presenter
 *
 * @author     Igor Hlina
 * @package    SACT
 */
class DefaultPresenter extends BasePresenter
{

	public function handleArticle($slug)
	{
		Content::setCurentSlug($slug);

		if ($this->isAjax()) {
			usleep(1500000);

			$this->invalidateControl('articleTxt');
		}
	}


	public function renderDefault()
	{
		$slug = Content::getCurentSlug();

		if (!$slug) {
			$article = Content::getFirstArticle();
		} else {
			$article = Content::getArticle($slug);
		}

		$this->template->article = $article;
	}


	protected function  createComponentNavigation($name)
	{
		$navigation = new Navigation($this, $name);
	}

}
