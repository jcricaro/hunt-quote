<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Author as AuthorInterface;
use Author as AuthorModel;
use Illuminate\Support\Facades\DB;

class Author extends AbstractEloquent implements AuthorInterface {

	public function __construct(AuthorModel $author, DB $db)
	{
		$this->model = $author;
		$this->db = $db;
	}

	/**
	 * {self-explanatory}
	 * @param  $limit [description]
	 * @return
	 */
	public function getRecentlyUpdated($limit = 10)
	{
		return $this->orderBy('id', 'desc')
			->take($limit)
			->get();
	}

	/**
	 * {self-explanatory}
	 * @param  integer $limit [description]
	 * @return [type]         [description]
	 */
	public function getWithBirthdaysToday($limit = 10)
	{
		return $this->orderBy('birth_date')
			->take($limit)
			->get();
	}

	/**
	 * {self-explanatory}
	 * @return [type] [description]
	 */
	public function groupedAlphabetically()
	{

		return $this->model->select(DB::raw('
				authors.name as name,
				count(authors.name) as total,
				substr(authors.name, 1, 1) as letter
				'))
			->groupBy('authors.id', DB::raw('substr(authors.name, 1, 1)'))
			->get();
	}
	
}