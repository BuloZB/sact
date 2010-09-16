<?php

namespace Models;

use	Dibi;


class Content
{

	public static function getHeads()
	{
		$result = dibi::select('headline, slug')
			->from('content')
			->fetchAll();

		return $result;
    }


	public static function getArticle($slug)
	{
		$result = dibi::select('*')
			->from('content')
			->where('slug=%s', $slug)
			->fetch();

		return $result;
    }

}
