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

	public function actionDefault()
	{
		$heads = Content::getHeads();
		$article = Content::getArticle($heads[0]->slug);

		$this->template->heads = $heads;
		$this->template->article = $article;
	}


	public function handleArticle($slug)
	{
		$heads = Content::getHeads();
		$article = Content::getArticle($slug);

		$this->template->heads = $heads;
		$this->template->article = $article;
	}

}
