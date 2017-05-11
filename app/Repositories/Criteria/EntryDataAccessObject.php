<?php
namespace App\Repositories\Criteria;
use App\Entities\EntryEntity;
use Illuminate\Database\DatabaseManager;
/**
 * Class EntryDataAccessObject
 * @package App\Repositories\Criteria
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class EntryDataAccessObject extends FluentObject implements Entryable
{
    /** @var DatabaseManager */
    protected $db;
    /** @var string */
    protected $table = 'users';
    /** @var string  */
    protected $identity = 'id';
    /**
     * @param DatabaseManager $db
     */
    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }
    /**
     * @param EntryEntity $item
     * @return int
     */
    public function save(EntryEntity $item)
    {
		error_log( print_r( __FILE__.'\n', true ), "3", "/tmp/debug.log" );
		error_log( print_r( __CLASS__.':'.__METHOD__, true ), "3", "/tmp/debug.log" );

        if (is_null($item->getId())) {
            return $this->db->connection()
                ->table($this->table)->insertGetId($this->data($item));
        }
        return $this->db->connection()
            ->table($this->table)
            ->where('id', $item->getId())->update($this->data($item));
    }
    /**
     * @param $id
     * @return EntryEntity
     */
    public function find($id)
    {
        $data = $this->db->connection()
            ->table($this->table)->where('id', $id)->first();
        if(is_null($data)) {
            return null;
        }
        return $this->getData($data, new EntryEntity);
    }
    /**
     * @return array|static[]
     */
    public function findAll()
    {
        return $this->db->connection()
            ->table($this->table)->get();
    }
}