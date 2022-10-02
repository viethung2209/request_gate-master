<?php

namespace App\Repositories;

use App\Contracts\Repositories\BookRepositoryInterface;
use App\Models\Book;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    /**
     * BookRepository constructor.
     * @param Book $book
     */
    public function __construct(Book $book)
    {
        parent::__construct($book);
    }

    /**
     * @param int $page
     * @param int $perPage
     * @param array $condition
     * @param array|string[] $column
     * @param array $with
     * @return mixed|void
     */
    public function getBooks(int $page, int $perPage, array $condition = [], array $column = ['*'], $with = [])
    {
        return $this->model
            ->when(count($condition), function ($query) use ($condition) {
                $query->where($condition);
            })
            ->with($with)
            ->paginate($perPage, $column, 'currentPage', $page);
    }

    /**
     * @param $value
     * @param string $attribute
     * @param null $exceptId
     * @return bool
     */
    public function existsBookByAttribute($value, $attribute = 'name', $exceptId = null): bool
    {
        return $this->model
            ->where($attribute, $value)
            ->when($exceptId, function ($query) use ($exceptId) {
                $query->where('id', '<>', $exceptId);
            })
            ->exists();
    }
}
