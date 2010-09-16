<?php

/**
 * My Application
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */

use	Models\Content;


/**
 * Homepage presenter.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class DefaultPresenter extends BasePresenter
{

	private $slug = null;


	public function handleArticle($slug)
	{
		$this->slug = $slug;

		if ($this->isAjax()) {
			usleep(1500000);

			$this->invalidateControl('articleTxt');
		}
	}


	public function renderDefault()
	{
		$heads = Content::getHeads();

		if ($this->slug) {
			$article = Content::getArticle($this->slug);
		} else {
			$article = Content::getArticle($heads[0]->slug);
		}

		$this->template->heads = $heads;
		$this->template->article = $article;
	}

}
