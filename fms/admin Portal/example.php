class Guestbookentry {
	public $id.$name,$message,$posted,$entry;
}

public function __construct() {
	 $this->entry = "{$this->name} posted: {$this->message}";
	 }
}
$query = $handler->query('SELECT *FROM guestbook');
$query->setFetchmode(PDO::FETCH_CLASS,'guestbookentry');
while($r = $query->fetch()) {
	echo $r->entry, '<br>';
}


















