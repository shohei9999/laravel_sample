<?php
namespace App\Entities;
/**
 * Class EntryEntity
 * @package App\Entities
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EntryEntity implements Entityable
{
    /** @var int */
    private $id;
    /** @var string  */
    public $name;
    /** @var int */
    public $cust_cd;
    /** @var string */
    public $email;
    /** @var string */
    public $password;
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
