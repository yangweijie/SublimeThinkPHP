<?php

// Start of mongo v.1.4.3

/**
 * A connection manager for PHP and MongoDB.
 * @link http://php.net/manual/en/class.mongoclient.php
 */
class MongoClient  {
	const DEFAULT_HOST = "localhost";
	const DEFAULT_PORT = 27017;
	const VERSION = "1.4.3";
	const RP_PRIMARY = "primary";
	const RP_PRIMARY_PREFERRED = "primaryPreferred";
	const RP_SECONDARY = "secondary";
	const RP_SECONDARY_PREFERRED = "secondaryPreferred";
	const RP_NEAREST = "nearest";

	/**
	 * @var boolean
	 */
	public $connected;
	/**
	 * @var string
	 */
	public $status;
	/**
	 * @var string
	 */
	protected $server;
	/**
	 * @var boolean
	 */
	protected $persistent;


	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * Creates a new database connection object
	 * @link http://php.net/manual/en/mongoclient.construct.php
	 * @param $server [optional]
	 * @param $options [optional]
	 */
	public function __construct ($serverarray , $options) {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Return info about all open connections
	 * @link http://php.net/manual/en/mongoclient.getconnections.php
	 * @return array An array of open connections.
	 */
	public static function getConnections () {}

	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * Connects to a database server
	 * @link http://php.net/manual/en/mongoclient.connect.php
	 * @return bool If the connection was successful.
	 */
	public function connect () {}

	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * String representation of this connection
	 * @link http://php.net/manual/en/mongoclient.tostring.php
	 * @return string hostname and port for this connection.
	 */
	public function __toString () {}

	/**
	 * (PECL mongoclient &gt;=1.0.2)<br/>
	 * Gets a database
	 * @link http://php.net/manual/en/mongoclient.get.php
	 * @param string $dbname <p>
	 * The database name.
	 * </p>
	 * @return MongoDB a new db object.
	 */
	public function __get ($dbname) {}

	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * Gets a database
	 * @link http://php.net/manual/en/mongoclient.selectdb.php
	 * @param string $name <p>
	 * The database name.
	 * </p>
	 * @return MongoDB a new database object.
	 */
	public function selectDB ($name) {}

	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * Gets a database collection
	 * @link http://php.net/manual/en/mongoclient.selectcollection.php
	 * @param string $db <p>
	 * The database name.
	 * </p>
	 * @param string $collection <p>
	 * The collection name.
	 * </p>
	 * @return MongoCollection a new collection object.
	 */
	public function selectCollection ($db, $collection) {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Get the read preference for this connection
	 * @link http://php.net/manual/en/mongoclient.getreadpreference.php
	 * @return array
	 */
	public function getReadPreference () {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Set the read preference for this connection
	 * @link http://php.net/manual/en/mongoclient.setreadpreference.php
	 * @param string $read_preference
	 * @param array $tags [optional]
	 * @return bool
	 */
	public function setReadPreference ($read_preference, array $tags = null) {}

	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * Drops a database [deprecated]
	 * @link http://php.net/manual/en/mongoclient.dropdb.php
	 * @param mixed $db <p>
	 * The database to drop. Can be a MongoDB object or the name of the database.
	 * </p>
	 * @return array the database response.
	 */
	public function dropDB ($db) {}

	/**
	 * (PECL mongoclient &gt;=1.0.4)<br/>
	 * Lists all of the databases available.
	 * @link http://php.net/manual/en/mongoclient.listdbs.php
	 * @return array an associative array containing three fields. The first field is
	 * databases, which in turn contains an array. Each element
	 * of the array is an associative array corresponding to a database, giving th
	 * database's name, size, and if it's empty. The other two fields are
	 * totalSize (in bytes) and ok, which is 1
	 * if this method ran successfully.
	 */
	public function listDBs () {}

	/**
	 * (PECL mongoclient &gt;=1.1.0)<br/>
	 * Updates status for all associated hosts
	 * @link http://php.net/manual/en/mongoclient.gethosts.php
	 * @return array an array of information about the hosts in the set. Includes each
	 * host's hostname, its health (1 is healthy), its state (1 is primary, 2 is
	 * secondary, 0 is anything else), the amount of time it took to ping the
	 * server, and when the last ping occurred. For example, on a three-member
	 * replica set, it might look something like:
	 */
	public function getHosts () {}

	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * Closes this connection
	 * @link http://php.net/manual/en/mongoclient.close.php
	 * @param boolean|string $connection [optional] <p>
	 * If connection is not given, or <b>FALSE</b> then connection that would be
	 * selected for writes would be closed. In a single-node configuration,
	 * that is then the whole connection, but if you are connected to a
	 * replica set, close() will only close the
	 * connection to the primary server.
	 * </p>
	 * <p>
	 * If connection is <b>TRUE</b> then all connections as known by the connection
	 * manager will be closed. This can include connections that are not
	 * referenced in the connection string used to create the object that
	 * you are calling close on.
	 * </p>
	 * <p>
	 * If connection is a string argument, then it will only close the
	 * connection identified by this hash. Hashes are identifiers for a
	 * connection and can be obtained by calling
	 * <b>MongoClient::getConnections</b>.
	 * </p>
	 * @return bool if the connection was successfully closed.
	 */
	public function close ($connection = null) {}

}

/**
 * A connection between PHP and MongoDB.
 * @link http://php.net/manual/en/class.mongo.php
 */
class Mongo extends MongoClient  {
	const DEFAULT_HOST = "localhost";
	const DEFAULT_PORT = 27017;
	const VERSION = "1.4.3";
	const RP_PRIMARY = "primary";
	const RP_PRIMARY_PREFERRED = "primaryPreferred";
	const RP_SECONDARY = "secondary";
	const RP_SECONDARY_PREFERRED = "secondaryPreferred";
	const RP_NEAREST = "nearest";

	/**
	 * @var boolean
	 */
	public $connected;
	/**
	 * @var string
	 */
	public $status;
	/**
	 * @var string
	 */
	protected $server;
	/**
	 * @var boolean
	 */
	protected $persistent;


	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * The __construct purpose
	 * @link http://php.net/manual/en/mongo.construct.php
	 * @param $server [optional]
	 * @param $options [optional]
	 */
	public function __construct ($serverarray , $options) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Connects with a database server
	 * @link http://php.net/manual/en/mongo.connectutil.php
	 * @return bool If the connection was successful.
	 */
	protected function connectUtil () {}

	/**
	 * (PECL mongo &gt;=1.1.0)<br/>
	 * Get slaveOkay setting for this connection
	 * @link http://php.net/manual/en/mongo.getslaveokay.php
	 * @return bool the value of slaveOkay for this instance.
	 */
	public function getSlaveOkay () {}

	/**
	 * (PECL mongo &gt;=1.1.0)<br/>
	 * Change slaveOkay setting for this connection
	 * @link http://php.net/manual/en/mongo.setslaveokay.php
	 * @param bool $ok [optional] <p>
	 * If reads should be sent to secondary members of a replica set for all
	 * possible queries using this <b>MongoClient</b> instance.
	 * </p>
	 * @return bool the former value of slaveOkay for this instance.
	 */
	public function setSlaveOkay ($ok = true) {}

	public function lastError () {}

	public function prevError () {}

	public function resetError () {}

	public function forceError () {}

	/**
	 * (PECL mongo &gt;=1.1.0)<br/>
	 * Returns the address being used by this for slaveOkay reads
	 * @link http://php.net/manual/en/mongo.getslave.php
	 * @return string The address of the secondary this connection is using for reads.
	 * </p>
	 * <p>
	 * This returns <b>NULL</b> if this is not connected to a replica set or not yet
	 * initialized.
	 */
	public function getSlave () {}

	/**
	 * (PECL mongo &gt;=1.1.0)<br/>
	 * Choose a new secondary for slaveOkay reads
	 * @link http://php.net/manual/en/mongo.switchslave.php
	 * @return string The address of the secondary this connection is using for reads. This may be
	 * the same as the previous address as addresses are randomly chosen. It may
	 * return only one address if only one secondary (or only the primary) is
	 * available.
	 * </p>
	 * <p>
	 * For example, if we had a three member replica set with a primary, secondary,
	 * and arbiter this method would always return the address of the secondary.
	 * If the secondary became unavailable, this method would always return the
	 * address of the primary. If the primary also became unavailable, this method
	 * would throw an exception, as an arbiter cannot handle reads.
	 */
	public function switchSlave () {}

	/**
	 * (PECL mongo &gt;=1.2.0)<br/>
	 * Set the size for future connection pools.
	 * @link http://php.net/manual/en/mongo.setpoolsize.php
	 * @param int $size <p>
	 * The max number of connections future pools will be able to create.
	 * Negative numbers mean that the pool will spawn an infinite number of
	 * connections.
	 * </p>
	 * @return bool the former value of pool size.
	 */
	public static function setPoolSize ($size) {}

	/**
	 * (PECL mongo &gt;=1.2.0)<br/>
	 * Get pool size for connection pools
	 * @link http://php.net/manual/en/mongo.getpoolsize.php
	 * @return int the current pool size.
	 */
	public static function getPoolSize () {}

	/**
	 * (PECL mongo &gt;=1.2.0)<br/>
	 * Returns information about all connection pools.
	 * @link http://php.net/manual/en/mongo.pooldebug.php
	 * @return array Each connection pool has an identifier, which starts with the host. For each
	 * pool, this function shows the following fields:
	 * <i>in use</i>
	 * <p>
	 * The number of connections currently being used by
	 * <b>MongoClient</b> instances.
	 * </p>
	 * <i>in pool</i>
	 * <p>
	 * The number of connections currently in the pool (not being used).
	 * </p>
	 * <i>remaining</i>
	 * <p>
	 * The number of connections that could be created by this pool. For
	 * example, suppose a pool had 5 connections remaining and 3 connections in
	 * the pool. We could create 8 new instances of
	 * <b>MongoClient</b> before we exhausted this pool
	 * (assuming no instances of <b>MongoClient</b> went out of
	 * scope, returning their connections to the pool).
	 * </p>
	 * <p>
	 * A negative number means that this pool will spawn unlimited connections.
	 * </p>
	 * <p>
	 * Before a pool is created, you can change the max number of connections by
	 * calling <b>Mongo::setPoolSize</b>. Once a pool is showing
	 * up in the output of this function, its size cannot be changed.
	 * </p>
	 * <i>timeout</i>
	 * <p>
	 * The socket timeout for connections in this pool. This is how long
	 * connections in this pool will attempt to connect to a server before
	 * giving up.
	 * </p>
	 */
	public static function poolDebug () {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Return info about all open connections
	 * @link http://php.net/manual/en/mongoclient.getconnections.php
	 * @return array An array of open connections.
	 */
	public static function getConnections () {}

	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * Connects to a database server
	 * @link http://php.net/manual/en/mongoclient.connect.php
	 * @return bool If the connection was successful.
	 */
	public function connect () {}

	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * String representation of this connection
	 * @link http://php.net/manual/en/mongoclient.tostring.php
	 * @return string hostname and port for this connection.
	 */
	public function __toString () {}

	/**
	 * (PECL mongoclient &gt;=1.0.2)<br/>
	 * Gets a database
	 * @link http://php.net/manual/en/mongoclient.get.php
	 * @param string $dbname <p>
	 * The database name.
	 * </p>
	 * @return MongoDB a new db object.
	 */
	public function __get ($dbname) {}

	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * Gets a database
	 * @link http://php.net/manual/en/mongoclient.selectdb.php
	 * @param string $name <p>
	 * The database name.
	 * </p>
	 * @return MongoDB a new database object.
	 */
	public function selectDB ($name) {}

	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * Gets a database collection
	 * @link http://php.net/manual/en/mongoclient.selectcollection.php
	 * @param string $db <p>
	 * The database name.
	 * </p>
	 * @param string $collection <p>
	 * The collection name.
	 * </p>
	 * @return MongoCollection a new collection object.
	 */
	public function selectCollection ($db, $collection) {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Get the read preference for this connection
	 * @link http://php.net/manual/en/mongoclient.getreadpreference.php
	 * @return array
	 */
	public function getReadPreference () {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Set the read preference for this connection
	 * @link http://php.net/manual/en/mongoclient.setreadpreference.php
	 * @param string $read_preference
	 * @param array $tags [optional]
	 * @return bool
	 */
	public function setReadPreference ($read_preference, array $tags = null) {}

	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * Drops a database [deprecated]
	 * @link http://php.net/manual/en/mongoclient.dropdb.php
	 * @param mixed $db <p>
	 * The database to drop. Can be a MongoDB object or the name of the database.
	 * </p>
	 * @return array the database response.
	 */
	public function dropDB ($db) {}

	/**
	 * (PECL mongoclient &gt;=1.0.4)<br/>
	 * Lists all of the databases available.
	 * @link http://php.net/manual/en/mongoclient.listdbs.php
	 * @return array an associative array containing three fields. The first field is
	 * databases, which in turn contains an array. Each element
	 * of the array is an associative array corresponding to a database, giving th
	 * database's name, size, and if it's empty. The other two fields are
	 * totalSize (in bytes) and ok, which is 1
	 * if this method ran successfully.
	 */
	public function listDBs () {}

	/**
	 * (PECL mongoclient &gt;=1.1.0)<br/>
	 * Updates status for all associated hosts
	 * @link http://php.net/manual/en/mongoclient.gethosts.php
	 * @return array an array of information about the hosts in the set. Includes each
	 * host's hostname, its health (1 is healthy), its state (1 is primary, 2 is
	 * secondary, 0 is anything else), the amount of time it took to ping the
	 * server, and when the last ping occurred. For example, on a three-member
	 * replica set, it might look something like:
	 */
	public function getHosts () {}

	/**
	 * (PECL mongoclient &gt;=0.9.0)<br/>
	 * Closes this connection
	 * @link http://php.net/manual/en/mongoclient.close.php
	 * @param boolean|string $connection [optional] <p>
	 * If connection is not given, or <b>FALSE</b> then connection that would be
	 * selected for writes would be closed. In a single-node configuration,
	 * that is then the whole connection, but if you are connected to a
	 * replica set, close() will only close the
	 * connection to the primary server.
	 * </p>
	 * <p>
	 * If connection is <b>TRUE</b> then all connections as known by the connection
	 * manager will be closed. This can include connections that are not
	 * referenced in the connection string used to create the object that
	 * you are calling close on.
	 * </p>
	 * <p>
	 * If connection is a string argument, then it will only close the
	 * connection identified by this hash. Hashes are identifiers for a
	 * connection and can be obtained by calling
	 * <b>MongoClient::getConnections</b>.
	 * </p>
	 * @return bool if the connection was successfully closed.
	 */
	public function close ($connection = null) {}

}

/**
 * Instances of this class are used to interact with a database. To get a
 * database:
 * Selecting a database
 * <code>
 * $m = new MongoClient(); // connect
 * $db = $m->selectDB("example");
 * </code>
 * Database names can use almost any character in the ASCII range. However,
 * they cannot contain &#x00022; &#x00022;, &#x00022;.&#x00022; or be the empty string.
 * The name "system" is also reserved.
 * @link http://php.net/manual/en/class.mongodb.php
 */
class MongoDB  {
	const PROFILING_OFF = 0;
	const PROFILING_SLOW = 1;
	const PROFILING_ON = 2;

	/**
	 * @var integer
	 */
	public $w;
	/**
	 * @var integer
	 */
	public $wtimeout;


	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Creates a new database
	 * @link http://php.net/manual/en/mongodb.construct.php
	 * @param MongoClient $conn <p>
	 * Database connection.
	 * </p>
	 * @param string $name <p>
	 * Database name.
	 * </p>
	 */
	public function __construct (MongoClient $conn, $name) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * The name of this database
	 * @link http://php.net/manual/en/mongodb.--tostring.php
	 * @return string this database&#x00027;s name.
	 */
	public function __toString () {}

	/**
	 * (PECL mongo &gt;=1.0.2)<br/>
	 * Gets a collection
	 * @link http://php.net/manual/en/mongodb.get.php
	 * @param string $name <p>
	 * The name of the collection.
	 * </p>
	 * @return MongoCollection the collection.
	 */
	public function __get ($name) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Fetches toolkit for dealing with files stored in this database
	 * @link http://php.net/manual/en/mongodb.getgridfs.php
	 * @param string $prefix [optional] <p>
	 * The prefix for the files and chunks collections.
	 * </p>
	 * @return MongoGridFS a new gridfs object for this database.
	 */
	public function getGridFS ($prefix = '&quot;fs&quot;') {}

	/**
	 * (PECL mongo &gt;=1.1.0)<br/>
	 * Get slaveOkay setting for this database
	 * @link http://php.net/manual/en/mongodb.getslaveokay.php
	 * @return bool the value of slaveOkay for this instance.
	 */
	public function getSlaveOkay () {}

	/**
	 * (PECL mongo &gt;=1.1.0)<br/>
	 * Change slaveOkay setting for this database
	 * @link http://php.net/manual/en/mongodb.setslaveokay.php
	 * @param bool $ok [optional] <p>
	 * If reads should be sent to secondary members of a replica set for all
	 * possible queries using this <b>MongoDB</b> instance.
	 * </p>
	 * @return bool the former value of slaveOkay for this instance.
	 */
	public function setSlaveOkay ($ok = true) {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Get the read preference for this database
	 * @link http://php.net/manual/en/mongodb.getreadpreference.php
	 * @return array
	 */
	public function getReadPreference () {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Set the read preference for this database
	 * @link http://php.net/manual/en/mongodb.setreadpreference.php
	 * @param string $read_preference
	 * @param array $tags [optional]
	 * @return bool
	 */
	public function setReadPreference ($read_preference, array $tags = null) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Gets this database&#x00027;s profiling level
	 * @link http://php.net/manual/en/mongodb.getprofilinglevel.php
	 * @return int the profiling level.
	 */
	public function getProfilingLevel () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Sets this database&#x00027;s profiling level
	 * @link http://php.net/manual/en/mongodb.setprofilinglevel.php
	 * @param int $level <p>
	 * Profiling level.
	 * </p>
	 * @return int the previous profiling level.
	 */
	public function setProfilingLevel ($level) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Drops this database
	 * @link http://php.net/manual/en/mongodb.drop.php
	 * @return array the database response.
	 */
	public function drop () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Repairs and compacts this database
	 * @link http://php.net/manual/en/mongodb.repair.php
	 * @param bool $preserve_cloned_files [optional] <p>
	 * If cloned files should be kept if the repair fails.
	 * </p>
	 * @param bool $backup_original_files [optional] <p>
	 * If original files should be backed up.
	 * </p>
	 * @return array db response.
	 */
	public function repair ($preserve_cloned_files = '&false;', $backup_original_files = '&false;') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Gets a collection
	 * @link http://php.net/manual/en/mongodb.selectcollection.php
	 * @param string $name <p>
	 * The collection name.
	 * </p>
	 * @return MongoCollection a new collection object.
	 */
	public function selectCollection ($name) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Creates a collection
	 * @link http://php.net/manual/en/mongodb.createcollection.php
	 * @param string $name <p>
	 * The name of the collection.
	 * </p>
	 * @param array $options [optional] <p>
	 * An array containing options for the collections. Each option is its own
	 * element in the options array, with the option name listed below being
	 * the key of the element. The supported options depend on the MongoDB
	 * server version. At the moment, the following options are supported:
	 * </p>
	 * <p>
	 * <i>capped</i>
	 * <p>
	 * If the collection should be a fixed size.
	 * </p>
	 * @return MongoCollection a collection object representing the new collection.
	 */
	public function createCollection ($name, array $options = null) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Drops a collection [deprecated]
	 * @link http://php.net/manual/en/mongodb.dropcollection.php
	 * @param mixed $coll <p>
	 * MongoCollection or name of collection to drop.
	 * </p>
	 * @return array the database response.
	 */
	public function dropCollection ($coll) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Gets an array of all MongoCollections for this database
	 * @link http://php.net/manual/en/mongodb.listcollections.php
	 * @param bool $includeSystemCollections [optional] <p>
	 * Include system collections.
	 * </p>
	 * @return array an array of MongoCollection objects.
	 */
	public function listCollections ($includeSystemCollections = false) {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Get all collections from this database
	 * @link http://php.net/manual/en/mongodb.getcollectionnames.php
	 * @param bool $includeSystemCollections [optional] <p>
	 * Include system collections.
	 * </p>
	 * @return array the names of the all the collections in the database as an array.
	 */
	public function getCollectionNames ($includeSystemCollections = false) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Creates a database reference
	 * @link http://php.net/manual/en/mongodb.createdbref.php
	 * @param string $collection <p>
	 * The collection to which the database reference will point.
	 * </p>
	 * @param mixed $document_or_id <p>
	 * If an array or object is given, its _id field will be
	 * used as the reference ID. If a <b>MongoId</b> or scalar
	 * is given, it will be used as the reference ID.
	 * </p>
	 * @return array a database reference array.
	 * </p>
	 * <p>
	 * If an array without an _id field was provided as the
	 * document_or_id parameter, <b>NULL</b> will be returned.
	 */
	public function createDBRef ($collection, $document_or_id) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Fetches the document pointed to by a database reference
	 * @link http://php.net/manual/en/mongodb.getdbref.php
	 * @param array $ref <p>
	 * A database reference.
	 * </p>
	 * @return array the document pointed to by the reference.
	 */
	public function getDBRef (array $ref) {}

	/**
	 * (PECL mongo &gt;=0.9.3)<br/>
	 * Runs JavaScript code on the database server.
	 * @link http://php.net/manual/en/mongodb.execute.php
	 * @param mixed $code <p>
	 * <b>MongoCode</b> or string to execute.
	 * </p>
	 * @param array $args [optional] <p>
	 * Arguments to be passed to code.
	 * </p>
	 * @return array the result of the evaluation.
	 */
	public function execute ($code, array $args = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.2)<br/>
	 * Execute a database command
	 * @link http://php.net/manual/en/mongodb.command.php
	 * @param array $command <p>
	 * The query to send.
	 * </p>
	 * @param array $options [optional] <p>
	 * This parameter is an associative array of the form
	 * array("optionname" => &lt;boolean&gt;, ...). Currently
	 * supported options are:
	 * <p>"timeout"</p><p>Integer, defaults to MongoCursor::$timeout. If acknowledged writes are used, this sets how long (in milliseconds) for the client to wait for a database response. If the database does not respond within the timeout period, a <b>MongoCursorTimeoutException</b> will be thrown.</p>
	 * </p>
	 * @return array database response. Every database response is always maximum one
	 * document, which means that the result of a database command can never
	 * exceed 16MB. The resulting document's structure depends on the command, but
	 * most results will have the ok field to indicate success
	 * or failure and results containing an array of each of
	 * the resulting documents.
	 */
	public function command (array $command, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.5)<br/>
	 * Check if there was an error on the most recent db operation performed
	 * @link http://php.net/manual/en/mongodb.lasterror.php
	 * @return array the error, if there was one.
	 */
	public function lastError () {}

	/**
	 * (PECL mongo &gt;=0.9.5)<br/>
	 * Checks for the last error thrown during a database operation
	 * @link http://php.net/manual/en/mongodb.preverror.php
	 * @return array the error and the number of operations ago it occurred.
	 */
	public function prevError () {}

	/**
	 * (PECL mongo &gt;=0.9.5)<br/>
	 * Clears any flagged errors on the database
	 * @link http://php.net/manual/en/mongodb.reseterror.php
	 * @return array the database response.
	 */
	public function resetError () {}

	/**
	 * (PECL mongo &gt;=0.9.5)<br/>
	 * Creates a database error
	 * @link http://php.net/manual/en/mongodb.forceerror.php
	 * @return bool the database response.
	 */
	public function forceError () {}

	/**
	 * (PECL mongo &gt;=1.0.1)<br/>
	 * Log in to this database
	 * @link http://php.net/manual/en/mongodb.authenticate.php
	 * @param string $username <p>
	 * The username.
	 * </p>
	 * @param string $password <p>
	 * The password (in plaintext).
	 * </p>
	 * @return array database response. If the login was successful, it will return
	 * <code>
	 * array("ok" => 1);
	 * </code>
	 * If something went wrong, it will return
	 * <code>
	 * array("ok" => 0, "errmsg" => "auth fails");
	 * </code>
	 * ("auth fails" could be another message, depending on database version and what
	 * when wrong).
	 */
	public function authenticate ($username, $password) {}

}

/**
 * Representations a database collection.
 * @link http://php.net/manual/en/class.mongocollection.php
 */
class MongoCollection  {
	const ASCENDING = 1;
	const DESCENDING = -1;

	/**
	 * @var integer
	 */
	public $w;
	/**
	 * @var integer
	 */
	public $wtimeout;


	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Creates a new collection
	 * @link http://php.net/manual/en/mongocollection.construct.php
	 * @param MongoDB $db <p>
	 * Parent database.
	 * </p>
	 * @param string $name <p>
	 * Name for this collection.
	 * </p>
	 */
	public function __construct (MongoDB $db, $name) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * String representation of this collection
	 * @link http://php.net/manual/en/mongocollection.--tostring.php
	 * @return string the full name of this collection.
	 */
	public function __toString () {}

	/**
	 * (PECL mongo &gt;=1.0.2)<br/>
	 * Gets a collection
	 * @link http://php.net/manual/en/mongocollection.get.php
	 * @param string $name <p>
	 * The next string in the collection name.
	 * </p>
	 * @return MongoCollection the collection.
	 */
	public function __get ($name) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns this collection&#x00027;s name
	 * @link http://php.net/manual/en/mongocollection.getname.php
	 * @return string the name of this collection.
	 */
	public function getName () {}

	/**
	 * (PECL mongo &gt;=1.1.0)<br/>
	 * Get slaveOkay setting for this collection
	 * @link http://php.net/manual/en/mongocollection.getslaveokay.php
	 * @return bool the value of slaveOkay for this instance.
	 */
	public function getSlaveOkay () {}

	/**
	 * (PECL mongo &gt;=1.1.0)<br/>
	 * Change slaveOkay setting for this collection
	 * @link http://php.net/manual/en/mongocollection.setslaveokay.php
	 * @param bool $ok [optional] <p>
	 * If reads should be sent to secondary members of a replica set for all
	 * possible queries using this <b>MongoCollection</b>
	 * instance.
	 * </p>
	 * @return bool the former value of slaveOkay for this instance.
	 */
	public function setSlaveOkay ($ok = true) {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Get the read preference for this collection
	 * @link http://php.net/manual/en/mongocollection.getreadpreference.php
	 * @return array
	 */
	public function getReadPreference () {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Set the read preference for this collection
	 * @link http://php.net/manual/en/mongocollection.setreadpreference.php
	 * @param string $read_preference
	 * @param array $tags [optional]
	 * @return bool
	 */
	public function setReadPreference ($read_preference, array $tags = null) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Drops this collection
	 * @link http://php.net/manual/en/mongocollection.drop.php
	 * @return array the database response.
	 */
	public function drop () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Validates this collection
	 * @link http://php.net/manual/en/mongocollection.validate.php
	 * @param bool $scan_data [optional] <p>
	 * Only validate indices, not the base collection.
	 * </p>
	 * @return array the database&#x00027;s evaluation of this object.
	 */
	public function validate ($scan_data = '&false;') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Inserts a document into the collection
	 * @link http://php.net/manual/en/mongocollection.insert.php
	 * @param array|object $a <p>
	 * An array or object. If an object is used, it may not have protected or
	 * private properties.
	 * </p>
	 * <p>
	 * If the parameter does not have an _id key or
	 * property, a new <b>MongoId</b> instance will be created
	 * and assigned to it. This special behavior does not mean that the
	 * parameter is passed by reference.
	 * </p>
	 * @param array $options [optional] <p>
	 * Options for the insert.
	 * <p>"fsync"</p><p>Boolean, defaults to <b>FALSE</b>. Forces the insert to be synced to disk before returning success. If <b>TRUE</b>, an acknowledged insert is implied and will override setting w to 0.</p>
	 * <p>"j"</p><p>Boolean, defaults to <b>FALSE</b>. Forces the insert to be synced to the journal before returning success. If <b>TRUE</b>, an acknowledged insert is implied and will override setting w to 0.</p>
	 * <p>"w"</p><p>See WriteConcerns. The default value for <b>MongoClient</b> is 1.</p>
	 * <p>"wtimeout"</p><p>How long to wait for WriteConcern acknowledgement. The default value for <b>MongoClient</b> is 10000 milliseconds.</p>
	 * <p>"safe"</p><p>Deprecated. Please use the WriteConcern w option.</p>
	 * <p>"timeout"</p><p>Integer, defaults to MongoCursor::$timeout. If acknowledged writes are used, this sets how long (in milliseconds) for the client to wait for a database response. If the database does not respond within the timeout period, a <b>MongoCursorTimeoutException</b> will be thrown.</p>
	 * </p>
	 * @return bool|array an array containing the status of the insertion if the
	 * "w" option is set. Otherwise, returns <b>TRUE</b> if the
	 * inserted array is not empty (a <b>MongoException</b> will be
	 * thrown if the inserted array is empty).
	 * </p>
	 * <p>
	 * If an array is returned, the following keys may be present:
	 * <i>ok</i>
	 * <p>
	 * This should almost always be 1 (unless last_error itself failed).
	 * </p>
	 * <i>err</i>
	 * <p>
	 * If this field is non-null, an error occurred on the previous operation.
	 * If this field is set, it will be a string describing the error that
	 * occurred.
	 * </p>
	 * <i>code</i>
	 * <p>
	 * If a database error occurred, the relevant error code will be passed
	 * back to the client.
	 * </p>
	 * <i>errmsg</i>
	 * <p>
	 * This field is set if something goes wrong with a database command. It
	 * is coupled with ok being 0. For example, if
	 * w is set and times out, errmsg will be set to "timed
	 * out waiting for slaves" and ok will be 0. If this
	 * field is set, it will be a string describing the error that occurred.
	 * </p>
	 * <i>n</i>
	 * <p>
	 * If the last operation was an update, upsert, or a remove, the number
	 * of documents affected will be returned. For insert operations, this value
	 * is always 0.
	 * </p>
	 * <i>wtimeout</i>
	 * <p>
	 * If the previous option timed out waiting for replication.
	 * </p>
	 * <i>waited</i>
	 * <p>
	 * How long the operation waited before timing out.
	 * </p>
	 * <i>wtime</i>
	 * <p>
	 * If w was set and the operation succeeded, how long it took to
	 * replicate to w servers.
	 * </p>
	 * <i>upserted</i>
	 * <p>
	 * If an upsert occurred, this field will contain the new record's
	 * _id field. For upserts, either this field or
	 * updatedExisting will be present (unless an error
	 * occurred).
	 * </p>
	 * <i>updatedExisting</i>
	 * <p>
	 * If an upsert updated an existing element, this field will be true. For
	 * upserts, either this field or upserted will be present (unless an error
	 * occurred).
	 * </p>
	 */
	public function insert ($a, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Inserts multiple documents into this collection
	 * @link http://php.net/manual/en/mongocollection.batchinsert.php
	 * @param array $a <p>
	 * An array of arrays or objects. If any objects are used, they may not have
	 * protected or private properties.
	 * </p>
	 * <p>
	 * If the documents to insert do not have an _id key or
	 * property, a new <b>MongoId</b> instance will be created
	 * and assigned to it. See <b>MongoCollection::insert</b> for
	 * additional information on this behavior.
	 * </p>
	 * @param array $options [optional] <p>
	 * Options for the inserts.
	 * <p>
	 * "continueOnError"
	 * </p>
	 * <p>
	 * Boolean, defaults to <b>FALSE</b>. If set, the database will not stop
	 * processing a bulk insert if one fails (eg due to duplicate IDs).
	 * This makes bulk insert behave similarly to a series of single
	 * inserts, except that calling <b>MongoDB::lastError</b>
	 * will have an error set if any insert fails, not just the last one.
	 * If multiple errors occur, only the most recent will be reported by
	 * <b>MongoDB::lastError</b>.
	 * </p>
	 * <p>
	 * Please note that continueOnError affects errors
	 * on the database side only. If you try to insert a document that has
	 * errors (for example it contains a key with an empty name), then the
	 * document is not even transferred to the database as the driver
	 * detects this error and bails out.
	 * continueOnError has no effect on errors detected
	 * in the documents by the driver.
	 * </p>
	 * @return mixed If the w parameter is set to acknowledge the write,
	 * returns an associative array with the status of the inserts ("ok") and any
	 * error that may have occurred ("err"). Otherwise, returns <b>TRUE</b> if the
	 * batch insert was successfully sent, <b>FALSE</b> otherwise.
	 */
	public function batchInsert (array $a, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Update records based on a given criteria
	 * @link http://php.net/manual/en/mongocollection.update.php
	 * @param array $criteria <p>
	 * Description of the objects to update.
	 * </p>
	 * @param array $new_object <p>
	 * The object with which to update the matching records.
	 * </p>
	 * @param array $options [optional] <p>
	 * This parameter is an associative array of the form
	 * array("optionname" => &lt;boolean&gt;, ...). Currently
	 * supported options are:
	 * <p>"w"</p><p>See WriteConcerns. The default value for <b>MongoClient</b> is 1.</p>
	 * <p>
	 * "upsert"
	 * </p>
	 * <p>
	 * If no document matches <i>$criteria</i>, a new
	 * document will be inserted.
	 * </p>
	 * <p>
	 * If a new document would be inserted and
	 * <i>$new_object</i> contains atomic modifiers
	 * (i.e. $ operators), those operations will be
	 * applied to the <i>$criteria</i> parameter to create
	 * the new document. If <i>$new_object</i> does not
	 * contain atomic modifiers, it will be used as-is for the inserted
	 * document. See the upsert examples below for more information.
	 * </p>
	 * @return bool|array an array containing the status of the update if the
	 * "w" option is set. Otherwise, returns <b>TRUE</b>.
	 * </p>
	 * <p>
	 * Fields in the status array are described in the documentation for
	 * <b>MongoCollection::insert</b>.
	 */
	public function update (array $criteria, array $new_object, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Remove records from this collection
	 * @link http://php.net/manual/en/mongocollection.remove.php
	 * @param array $criteria [optional] <p>
	 * Description of records to remove.
	 * </p>
	 * @param array $options [optional] <p>
	 * Options for remove.
	 * <p>"w"</p><p>See WriteConcerns. The default value for <b>MongoClient</b> is 1.</p>
	 * <p>
	 * "justOne"
	 * </p>
	 * <p>
	 * Remove at most one record matching this criteria.
	 * </p>
	 * @return bool|array an array containing the status of the removal if the
	 * "w" option is set. Otherwise, returns <b>TRUE</b>.
	 * </p>
	 * <p>
	 * Fields in the status array are described in the documentation for
	 * <b>MongoCollection::insert</b>.
	 */
	public function remove (array $criteria = 'array()', array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Querys this collection, returning a <b>MongoCursor</b>
for the result set
	 * @link http://php.net/manual/en/mongocollection.find.php
	 * @param array $query [optional] <p>
	 * The fields for which to search. MongoDB's query language is quite
	 * extensive. The PHP driver will in almost all cases pass the query
	 * straight through to the server, so reading the MongoDB core docs on
	 * find is a good idea.
	 * </p>
	 * <p>
	 * Please make sure that for all special query operators (starting with
	 * $) you use single quotes so that PHP doesn't try to
	 * replace "$exists" with the value of the variable
	 * $exists.
	 * </p>
	 * @param array $fields [optional] <p>
	 * Fields of the results to return. The array is in the format
	 * array('fieldname' => true, 'fieldname2' => true).
	 * The _id field is always returned.
	 * </p>
	 * @return MongoCursor a cursor for the search results.
	 */
	public function find (array $query = 'array()', array $fields = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Querys this collection, returning a single element
	 * @link http://php.net/manual/en/mongocollection.findone.php
	 * @param array $query [optional] <p>
	 * The fields for which to search. MongoDB's query language is quite
	 * extensive. The PHP driver will in almost all cases pass the query
	 * straight through to the server, so reading the MongoDB core docs on
	 * find is a good idea.
	 * </p>
	 * <p>
	 * Please make sure that for all special query operaters (starting with
	 * $) you use single quotes so that PHP doesn't try to
	 * replace "$exists" with the value of the variable
	 * $exists.
	 * </p>
	 * @param array $fields [optional] <p>
	 * Fields of the results to return. The array is in the format
	 * array('fieldname' => true, 'fieldname2' => true).
	 * The _id field is always returned.
	 * </p>
	 * @return array record matching the search or <b>NULL</b>.
	 */
	public function findOne (array $query = 'array()', array $fields = 'array()') {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Update a document and return it
	 * @link http://php.net/manual/en/mongocollection.findandmodify.php
	 * @param array $query <p>
	 * The query criteria to search for.
	 * </p>
	 * @param array $update [optional] <p>
	 * The update criteria.
	 * </p>
	 * @param array $fields [optional] <p>
	 * Optionally only return these fields.
	 * </p>
	 * @param array $options [optional] <p>
	 * An array of options to apply, such as remove the match document from the
	 * DB and return it.
	 * <tr valign="top">
	 * <td>Option</td>
	 * <td>Description</td>
	 * </tr>
	 * <tr valign="top">
	 * <td>sort array</td>
	 * <td>
	 * Determines which document the operation will modify if the
	 * query selects multiple documents. findAndModify will modify the
	 * first document in the sort order specified by this argument.
	 * </td>
	 * </tr>
	 * <tr valign="top">
	 * <td>remove boolean</td>
	 * <td>
	 * Optional if update field exists. When <b>TRUE</b>, removes the selected
	 * document. The default is <b>FALSE</b>.
	 * </td>
	 * </tr>
	 * <tr valign="top">
	 * <td>update array</td>
	 * <td>
	 * Optional if remove field exists.
	 * Performs an update of the selected document.
	 * </td>
	 * </tr>
	 * <tr valign="top">
	 * <td>new boolean</td>
	 * <td>
	 * Optional. When <b>TRUE</b>, returns the modified document rather than the
	 * original. The findAndModify method ignores the new option for
	 * remove operations. The default is <b>FALSE</b>.
	 * </td>
	 * </tr>
	 * <tr valign="top">
	 * <td>upsert boolean</td>
	 * <td>
	 * Optional. Used in conjunction with the update field. When <b>TRUE</b>, the
	 * findAndModify command creates a new document if the query returns
	 * no documents. The default is false. In MongoDB 2.2, the
	 * findAndModify command returns <b>NULL</b> when upsert is <b>TRUE</b>.
	 * </td>
	 * </tr>
	 * <tr valign="top">
	 * <td></td>
	 * <td>
	 * </td>
	 * </tr>
	 * </p>
	 * @return array the original document, or the modified document when
	 * new is set.
	 */
	public function findAndModify (array $query, array $update = null, array $fields = null, array $options = null) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Creates an index on the given field(s), or does nothing if the index 
already exists
	 * @link http://php.net/manual/en/mongocollection.ensureindex.php
	 * @param string|array $key_keys
	 * @param array $options [optional] <p>
	 * This parameter is an associative array of the form
	 * array("optionname" => &lt;boolean&gt;, ...). Currently
	 * supported options are:
	 * <p>"w"</p><p>See WriteConcerns. The default value for <b>MongoClient</b> is 1.</p>
	 * <p>
	 * "unique"
	 * </p>
	 * <p>
	 * Create a unique index.
	 * </p>
	 * <p>
	 * A unique index cannot be created on a field if multiple existing
	 * documents do not contain the field. The field is effectively <b>NULL</b>
	 * for these documents and thus already non-unique. Sparse indexing may
	 * be used to overcome this, since it will prevent documents without the
	 * field from being indexed.
	 * </p>
	 * @return bool an array containing the status of the index creation if the
	 * "w" option is set. Otherwise, returns <b>TRUE</b>.
	 * </p>
	 * <p>
	 * Fields in the status array are described in the documentation for
	 * <b>MongoCollection::insert</b>.
	 */
	public function ensureIndex ($key_keys, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Deletes an index from this collection
	 * @link http://php.net/manual/en/mongocollection.deleteindex.php
	 * @param string|array $keys <p>
	 * Field or fields from which to delete the index.
	 * </p>
	 * @return array the database response.
	 */
	public function deleteIndex ($keys) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Delete all indices for this collection
	 * @link http://php.net/manual/en/mongocollection.deleteindexes.php
	 * @return array the database response.
	 */
	public function deleteIndexes () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns information about indexes on this collection
	 * @link http://php.net/manual/en/mongocollection.getindexinfo.php
	 * @return array This function returns an array in which each element describes an index.
	 * Elements will contain the values name for the name of
	 * the index, ns for the namespace (a combination of the
	 * database and collection name), and key for a list of all
	 * fields in the index and their ordering. Additional values may be present for
	 * special indexes, such as unique or
	 * sparse.
	 */
	public function getIndexInfo () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Counts the number of documents in this collection
	 * @link http://php.net/manual/en/mongocollection.count.php
	 * @param array $query [optional] <p>
	 * Associative array or object with fields to match.
	 * </p>
	 * @param int $limit [optional] <p>
	 * Specifies an upper limit to the number returned.
	 * </p>
	 * @param int $skip [optional] <p>
	 * Specifies a number of results to skip before starting the count.
	 * </p>
	 * @return int the number of documents matching the query.
	 */
	public function count (array $query = 'array()', $limit = 0, $skip = 0) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Saves a document to this collection
	 * @link http://php.net/manual/en/mongocollection.save.php
	 * @param array|object $a <p>
	 * Array or object to save. If an object is used, it may not have protected
	 * or private properties.
	 * </p>
	 * <p>
	 * If the parameter does not have an _id key or
	 * property, a new <b>MongoId</b> instance will be created
	 * and assigned to it. See <b>MongoCollection::insert</b> for
	 * additional information on this behavior.
	 * </p>
	 * @param array $options [optional] <p>
	 * Options for the save.
	 * <p>"fsync"</p><p>Boolean, defaults to <b>FALSE</b>. Forces the insert to be synced to disk before returning success. If <b>TRUE</b>, an acknowledged insert is implied and will override setting w to 0.</p>
	 * <p>"j"</p><p>Boolean, defaults to <b>FALSE</b>. Forces the insert to be synced to the journal before returning success. If <b>TRUE</b>, an acknowledged insert is implied and will override setting w to 0.</p>
	 * <p>"w"</p><p>See WriteConcerns. The default value for <b>MongoClient</b> is 1.</p>
	 * <p>"wtimeout"</p><p>How long to wait for WriteConcern acknowledgement. The default value for <b>MongoClient</b> is 10000 milliseconds.</p>
	 * <p>"safe"</p><p>Deprecated. Please use the WriteConcern w option.</p>
	 * <p>"timeout"</p><p>Integer, defaults to MongoCursor::$timeout. If acknowledged writes are used, this sets how long (in milliseconds) for the client to wait for a database response. If the database does not respond within the timeout period, a <b>MongoCursorTimeoutException</b> will be thrown.</p>
	 * </p>
	 * @return mixed If <i>w</i> was set, returns an array containing the status of the save.
	 * Otherwise, returns a boolean representing if the array was not empty (an empty array will not
	 * be inserted).
	 */
	public function save ($a, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Creates a database reference
	 * @link http://php.net/manual/en/mongocollection.createdbref.php
	 * @param mixed $document_or_id <p>
	 * If an array or object is given, its _id field will be
	 * used as the reference ID. If a <b>MongoId</b> or scalar
	 * is given, it will be used as the reference ID.
	 * </p>
	 * @return array a database reference array.
	 * </p>
	 * <p>
	 * If an array without an _id field was provided as the
	 * document_or_id parameter, <b>NULL</b> will be returned.
	 */
	public function createDBRef ($document_or_id) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Fetches the document pointed to by a database reference
	 * @link http://php.net/manual/en/mongocollection.getdbref.php
	 * @param array $ref <p>
	 * A database reference.
	 * </p>
	 * @return array the database document pointed to by the reference.
	 */
	public function getDBRef (array $ref) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Converts keys specifying an index to its identifying string
	 * @link http://php.net/manual/en/mongocollection.toindexstring.php
	 * @param mixed $keys <p>
	 * Field or fields to convert to the identifying string
	 * </p>
	 * @return string a string that describes the index.
	 */
	protected static function toIndexString ($keys) {}

	/**
	 * (PECL mongo &gt;=0.9.2)<br/>
	 * Performs an operation similar to SQL's GROUP BY command
	 * @link http://php.net/manual/en/mongocollection.group.php
	 * @param mixed $keys <p>
	 * Fields to group by. If an array or non-code object is passed, it will be
	 * the key used to group results.
	 * </p>
	 * <p>1.0.4+: If <i>keys</i> is an instance of
	 * <b>MongoCode</b>, <i>keys</i> will be treated as
	 * a function that returns the key to group by (see the "Passing a
	 * <i>keys</i> function" example below).
	 * </p>
	 * @param array $initial <p>
	 * Initial value of the aggregation counter object.
	 * </p>
	 * @param MongoCode $reduce <p>
	 * A function that takes two arguments (the current document and the
	 * aggregation to this point) and does the aggregation.
	 * </p>
	 * @param array $options [optional] <p>
	 * Optional parameters to the group command. Valid options include:
	 * </p>
	 * <p>
	 * "condition"
	 * </p>
	 * <p>
	 * Criteria for including a document in the aggregation.
	 * </p>
	 * @return array an array containing the result.
	 */
	public function group ($keys, array $initial, MongoCode $reduce, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=1.2.11)<br/>
	 * Retrieve a list of distinct values for the given key across a collection.
	 * @link http://php.net/manual/en/mongocollection.distinct.php
	 * @param string $key <p>
	 * The key to use.
	 * </p>
	 * @param array $query [optional] <p>
	 * An optional query parameters
	 * </p>
	 * @return array an array of distinct values, or <b>FALSE</b> on failure
	 */
	public function distinct ($key, array $query = null) {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Perform an aggregation using the aggregation framework
	 * @link http://php.net/manual/en/mongocollection.aggregate.php
	 * @param array $pipeline <p>
	 * An array of pipeline operators, or just the first operator.
	 * </p>
	 * @param array $op [optional] <p>
	 * The second pipeline operator.
	 * </p>
	 * @param array $_ [optional] <p>
	 * Additional pipeline operators.
	 * </p>
	 * @return array The result of the aggregation as an array. The ok will
	 * be set to 1 on success, 0 on failure.
	 */
	public function aggregate (array $pipeline, array $op = null, array $_ = null) {}

}

/**
 * A cursor is used to iterate through the results of a database query. For
 * example, to query the database and see all results, you could do:
 * <b>MongoCursor</b> basic usage
 * <code>
 * $cursor = $collection->find();
 * var_dump(iterator_to_array($cursor));
 * </code>
 * @link http://php.net/manual/en/class.mongocursor.php
 */
class MongoCursor implements Iterator, Traversable {
	/**
	 * @var boolean
	 */
	public static $slaveOkay;
	/**
	 * @var integer
	 */
	public static $timeout;


	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Create a new cursor
	 * @link http://php.net/manual/en/mongocursor.construct.php
	 * @param MongoClient $connection <p>
	 * Database connection.
	 * </p>
	 * @param string $ns <p>
	 * Full name of database and collection.
	 * </p>
	 * @param array $query [optional] <p>
	 * Database query.
	 * </p>
	 * @param array $fields [optional] <p>
	 * Fields to return.
	 * </p>
	 */
	public function __construct (MongoClient $connection, $ns, array $query = 'array()', array $fields = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Checks if there are any more elements in this cursor
	 * @link http://php.net/manual/en/mongocursor.hasnext.php
	 * @return bool if there is another element.
	 */
	public function hasNext () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Return the next object to which this cursor points, and advance the cursor
	 * @link http://php.net/manual/en/mongocursor.getnext.php
	 * @return array the next object.
	 */
	public function getNext () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Limits the number of results returned
	 * @link http://php.net/manual/en/mongocursor.limit.php
	 * @param int $num <p>
	 * The number of results to return.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function limit ($num) {}

	/**
	 * (PECL mongo &gt;=1.0.11)<br/>
	 * Limits the number of elements returned in one batch.
	 * @link http://php.net/manual/en/mongocursor.batchsize.php
	 * @param int $batchSize <p>
	 * The number of results to return per batch. Each batch requires a
	 * round-trip to the server.
	 * </p>
	 * <p>
	 * If <i>batchSize</i> is 2 or
	 * more, it represents the size of each batch of objects retrieved.
	 * It can be adjusted to optimize performance and limit data transfer.
	 * </p>
	 * <p>
	 * If <i>batchSize</i> is 1 or negative, it
	 * will limit of number returned documents to the absolute value of batchSize,
	 * and the cursor will be closed. For example if
	 * batchSize is -10, then the server will return a maximum
	 * of 10 documents and as many as can fit in 4MB, then close the cursor.
	 * </p>
	 * <p>
	 * A <i>batchSize</i> of 1 is special, and
	 * means the same as -1, i.e. a value of
	 * 1 makes the cursor only capable of returning
	 * one document.
	 * </p>
	 * <p>
	 * Note that this feature is different from
	 * <b>MongoCursor::limit</b> in that documents must fit within a
	 * maximum size, and it removes the need to send a request to close the cursor
	 * server-side. The batch size can be changed even after a cursor is iterated,
	 * in which case the setting will apply on the next batch retrieval.
	 * </p>
	 * <p>
	 * This cannot override MongoDB's limit on the amount of data it will return to
	 * the client (i.e., if you set batch size to 1,000,000,000, MongoDB will still
	 * only return 4-16MB of results per batch).
	 * </p>
	 * <p>
	 * To ensure consistent behavior, the rules of
	 * <b>MongoCursor::batchSize</b> and
	 * <b>MongoCursor::limit</b> behave a
	 * little complex but work "as expected". The rules are: hard limits override
	 * soft limits with preference given to <b>MongoCursor::limit</b>
	 * over <b>MongoCursor::batchSize</b>. After that, whichever is
	 * set and lower than the other will take precedence. See below.
	 * section for some examples.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function batchSize ($batchSize) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Skips a number of results
	 * @link http://php.net/manual/en/mongocursor.skip.php
	 * @param int $num <p>
	 * The number of results to skip.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function skip ($num) {}

	/**
	 * (PECL mongo &gt;=1.0.6)<br/>
	 * Sets the fields for a query
	 * @link http://php.net/manual/en/mongocursor.fields.php
	 * @param array $f <p>
	 * Fields to return (or not return).
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function fields (array $f) {}

	/**
	 * (PECL mongo &gt;=1.0.4)<br/>
	 * Adds a top-level key/value pair to a query
	 * @link http://php.net/manual/en/mongocursor.addoption.php
	 * @param string $key <p>
	 * Fieldname to add.
	 * </p>
	 * @param mixed $value <p>
	 * Value to add.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function addOption ($key, $value) {}

	/**
	 * (PECL mongo &gt;=0.9.4)<br/>
	 * Use snapshot mode for the query
	 * @link http://php.net/manual/en/mongocursor.snapshot.php
	 * @return MongoCursor this cursor.
	 */
	public function snapshot () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Sorts the results by given fields
	 * @link http://php.net/manual/en/mongocursor.sort.php
	 * @param array $fields <p>
	 * An array of fields by which to sort. Each element in the array has as
	 * key the field name, and as value either 1 for
	 * ascending sort, or -1 for descending sort.
	 * </p>
	 * <p>
	 * Each result is first sorted on the first field in the array, then (if
	 * it exists) on the second field in the array, etc. This means that the
	 * order of the fields in the <i>fields</i> array is
	 * important. See also the examples section.
	 * </p>
	 * @return MongoCursor the same cursor that this method was called on.
	 */
	public function sort (array $fields) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Gives the database a hint about the query
	 * @link http://php.net/manual/en/mongocursor.hint.php
	 * @param mixed $index <p>
	 * Index to use for the query. If a string is passed, it should correspond
	 * to an index name. If an array or object is passed, it should correspond
	 * to the specification used to create the index (i.e. the first argument
	 * to <b>MongoCollection::ensureIndex</b>).
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function hint ($index) {}

	/**
	 * (PECL mongo &gt;=0.9.2)<br/>
	 * Return an explanation of the query, often useful for optimization and debugging
	 * @link http://php.net/manual/en/mongocursor.explain.php
	 * @return array an explanation of the query.
	 */
	public function explain () {}

	/**
	 * (PECL mongo &gt;=1.2.11)<br/>
	 * Sets arbitrary flags in case there is no method available the specific flag
	 * @link http://php.net/manual/en/mongocursor.setflag.php
	 * @param int $flag <p>
	 * Which flag to set. You can not set flag 6 (EXHAUST) as the driver does
	 * not know how to handle them. You will get a warning if you try to use
	 * this flag. For available flags, please refer to the wire protocol
	 * documentation.
	 * </p>
	 * @param bool $set [optional] <p>
	 * Whether the flag should be set (<b>TRUE</b>) or unset (<b>FALSE</b>).
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function setFlag ($flag, $set = true) {}

	/**
	 * (PECL mongo &gt;=0.9.4)<br/>
	 * Sets whether this query can be done on a secondary
	 * @link http://php.net/manual/en/mongocursor.slaveokay.php
	 * @param bool $okay [optional] <p>
	 * If it is okay to query the secondary.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function slaveOkay ($okay = true) {}

	/**
	 * (PECL mongo &gt;=0.9.4)<br/>
	 * Sets whether this cursor will be left open after fetching the last results
	 * @link http://php.net/manual/en/mongocursor.tailable.php
	 * @param bool $tail [optional] <p>
	 * If the cursor should be tailable.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function tailable ($tail = true) {}

	/**
	 * (PECL mongo &gt;=1.0.1)<br/>
	 * Sets whether this cursor will timeout
	 * @link http://php.net/manual/en/mongocursor.immortal.php
	 * @param bool $liveForever [optional] <p>
	 * If the cursor should be immortal.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function immortal ($liveForever = true) {}

	/**
	 * (PECL mongo &gt;=1.2.11)<br/>
	 * Sets whether this cursor will wait for a while for a tailable cursor to return more data
	 * @link http://php.net/manual/en/mongocursor.awaitdata.php
	 * @param bool $wait [optional] <p>
	 * If the cursor should wait for more data to become available.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function awaitData ($wait = true) {}

	/**
	 * (PECL mongo &gt;=1.2.0)<br/>
	 * If this query should fetch partial results from mongos if a shard is down
	 * @link http://php.net/manual/en/mongocursor.partial.php
	 * @param bool $okay [optional] <p>
	 * If receiving partial results is okay.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function partial ($okay = true) {}

	/**
	 * (PECL mongo &gt;=1.3.3)<br/>
	 * Get the read preference for this query
	 * @link http://php.net/manual/en/mongocursor.getreadpreference.php
	 * @return array
	 */
	public function getReadPreference () {}

	/**
	 * (PECL mongo &gt;=1.3.3)<br/>
	 * Set the read preference for this query
	 * @link http://php.net/manual/en/mongocursor.setreadpreference.php
	 * @param string $read_preference
	 * @param array $tags [optional]
	 * @return bool
	 */
	public function setReadPreference ($read_preference, array $tags = null) {}

	/**
	 * (PECL mongo &gt;=1.0.3)<br/>
	 * Sets a client-side timeout for this query
	 * @link http://php.net/manual/en/mongocursor.timeout.php
	 * @param int $ms <p>
	 * The number of milliseconds for the cursor to wait for a response. By
	 * default, the cursor will wait forever.
	 * </p>
	 * @return MongoCursor This cursor.
	 */
	public function timeout ($ms) {}

	/**
	 * (No version information available, might only be in SVN)<br/>
	 * Execute the query.
	 * @link http://php.net/manual/en/mongocursor.doquery.php
	 * @return void <b>NULL</b>.
	 */
	protected function doQuery () {}

	/**
	 * (PECL mongo &gt;=1.0.5)<br/>
	 * Gets the query, fields, limit, and skip for this cursor
	 * @link http://php.net/manual/en/mongocursor.info.php
	 * @return array the namespace, limit, skip, query, and fields for this cursor.
	 */
	public function info () {}

	/**
	 * (PECL mongo &gt;=0.9.6)<br/>
	 * Checks if there are documents that have not been sent yet from the database for this cursor
	 * @link http://php.net/manual/en/mongocursor.dead.php
	 * @return bool if there are more results that have not been sent to the client, yet.
	 */
	public function dead () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns the current element
	 * @link http://php.net/manual/en/mongocursor.current.php
	 * @return array The current result as an associative array.
	 */
	public function current () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns the current result&#x00027;s _id
	 * @link http://php.net/manual/en/mongocursor.key.php
	 * @return string The current result&#x00027;s _id as a string.
	 */
	public function key () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Advances the cursor to the next result
	 * @link http://php.net/manual/en/mongocursor.next.php
	 * @return void <b>NULL</b>.
	 */
	public function next () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns the cursor to the beginning of the result set
	 * @link http://php.net/manual/en/mongocursor.rewind.php
	 * @return void <b>NULL</b>.
	 */
	public function rewind () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Checks if the cursor is reading a valid result.
	 * @link http://php.net/manual/en/mongocursor.valid.php
	 * @return bool If the current result is not null.
	 */
	public function valid () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Clears the cursor
	 * @link http://php.net/manual/en/mongocursor.reset.php
	 * @return void <b>NULL</b>.
	 */
	public function reset () {}

	/**
	 * (PECL mongo &gt;=0.9.2)<br/>
	 * Counts the number of results for this query
	 * @link http://php.net/manual/en/mongocursor.count.php
	 * @param bool $foundOnly [optional] <p>
	 * Send cursor limit and skip information to the count function, if applicable.
	 * </p>
	 * @return int The number of documents returned by this cursor's query.
	 */
	public function count ($foundOnly = '&false;') {}

}

/**
 * Utilities for storing and retrieving files from the database.
 * @link http://php.net/manual/en/class.mongogridfs.php
 */
class MongoGridFS extends MongoCollection  {
	const ASCENDING = 1;
	const DESCENDING = -1;

	/**
	 * @var integer
	 */
	public $w;
	/**
	 * @var integer
	 */
	public $wtimeout;
	public $chunks;
	protected $filesName;
	protected $chunksName;


	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Creates new file collections
	 * @link http://php.net/manual/en/mongogridfs.construct.php
	 * @param MongoDB $db <p>
	 * Database.
	 * </p>
	 * @param string $prefix [optional]
	 * @param mixed $chunks [optional]
	 */
	public function __construct (MongoDB $db, $prefix = '&quot;fs&quot;', $chunks = '&quot;fs&quot;') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Drops the files and chunks collections
	 * @link http://php.net/manual/en/mongogridfs.drop.php
	 * @return array The database response.
	 */
	public function drop () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Queries for files
	 * @link http://php.net/manual/en/mongogridfs.find.php
	 * @param array $query [optional] <p>
	 * The query.
	 * </p>
	 * @param array $fields [optional] <p>
	 * Fields to return.
	 * </p>
	 * @return MongoGridFSCursor A <b>MongoGridFSCursor</b>.
	 */
	public function find (array $query = 'array()', array $fields = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Stores a file in the database
	 * @link http://php.net/manual/en/mongogridfs.storefile.php
	 * @param string $filename <p>
	 * Name of the file to store.
	 * </p>
	 * @param array $metadata [optional] <p>
	 * Other metadata fields to include in the file document.
	 * </p>
	 * <p>These fields may also overwrite those that would be created automatically by the driver, as described in the MongoDB core documentation for the files collection. Some practical use cases for this behavior would be to specify a custom chunkSize or _id for the file.</p>
	 * @param array $options [optional] <p>
	 * Options for the store.
	 * <p>"w"</p><p>See WriteConcerns. The default value for <b>MongoClient</b> is 1.</p>
	 * </p>
	 * @return mixed
	 */
	public function storeFile ($filename, array $metadata = 'array()', array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.2)<br/>
	 * Stores a string of bytes in the database
	 * @link http://php.net/manual/en/mongogridfs.storebytes.php
	 * @param string $bytes <p>
	 * String of bytes to store.
	 * </p>
	 * @param array $metadata [optional] <p>
	 * Other metadata fields to include in the file document.
	 * </p>
	 * <p>These fields may also overwrite those that would be created automatically by the driver, as described in the MongoDB core documentation for the files collection. Some practical use cases for this behavior would be to specify a custom chunkSize or _id for the file.</p>
	 * @param array $options [optional] <p>
	 * Options for the store.
	 * <p>"w"</p><p>See WriteConcerns. The default value for <b>MongoClient</b> is 1.</p>
	 * </p>
	 * @return mixed
	 */
	public function storeBytes ($bytes, array $metadata = 'array()', array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns a single file matching the criteria
	 * @link http://php.net/manual/en/mongogridfs.findone.php
	 * @param mixed $query [optional] <p>
	 * The filename or criteria for which to search.
	 * </p>
	 * @param mixed $fields [optional]
	 * @return MongoGridFSFile a <b>MongoGridFSFile</b> or <b>NULL</b>.
	 */
	public function findOne ($query = 'array()', $fields = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Removes files from the collections
	 * @link http://php.net/manual/en/mongogridfs.remove.php
	 * @param array $criteria [optional]
	 * @param array $options [optional] <p>
	 * Options for the remove. Valid options are:
	 * </p>
	 * <p>"w"</p><p>See WriteConcerns. The default value for <b>MongoClient</b> is 1.</p>
	 * @return bool if the removal was successfully sent to the database.
	 */
	public function remove (array $criteria = 'array()', array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Stores an uploaded file in the database
	 * @link http://php.net/manual/en/mongogridfs.storeupload.php
	 * @param string $name <p>
	 * The name of the uploaded file to store. This should correspond to the
	 * file field's name attribute in the HTML form.
	 * </p>
	 * @param array $metadata [optional] <p>
	 * Other metadata fields to include in the file document.
	 * </p>
	 * <p>These fields may also overwrite those that would be created automatically by the driver, as described in the MongoDB core documentation for the files collection. Some practical use cases for this behavior would be to specify a custom chunkSize or _id for the file.</p>
	 * <p>
	 * The filename index will be populated with the
	 * filename used.
	 * </p>
	 * @return mixed
	 */
	public function storeUpload ($name, array $metadata = null) {}

	/**
	 * (PECL mongo &gt;=1.0.8)<br/>
	 * Delete a file from the database
	 * @link http://php.net/manual/en/mongogridfs.delete.php
	 * @param mixed $id <p>
	 * _id of the file to remove.
	 * </p>
	 * @return bool if the remove was successfully sent to the database.
	 */
	public function delete ($id) {}

	/**
	 * (PECL mongo &gt;=1.0.8)<br/>
	 * Retrieve a file from the database
	 * @link http://php.net/manual/en/mongogridfs.get.php
	 * @param mixed $id <p>
	 * _id of the file to find.
	 * </p>
	 * @return MongoGridFSFile the file, if found, or <b>NULL</b>.
	 */
	public function get ($id) {}

	/**
	 * (PECL mongo &gt;=1.0.8)<br/>
	 * Stores a file in the database
	 * @link http://php.net/manual/en/mongogridfs.put.php
	 * @param string $filename <p>
	 * Name of the file to store.
	 * </p>
	 * @param array $metadata [optional] <p>
	 * Other metadata fields to include in the file document.
	 * </p>
	 * <p>These fields may also overwrite those that would be created automatically by the driver, as described in the MongoDB core documentation for the files collection. Some practical use cases for this behavior would be to specify a custom chunkSize or _id for the file.</p>
	 * @return mixed
	 */
	public function put ($filename, array $metadata = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * String representation of this collection
	 * @link http://php.net/manual/en/mongocollection.--tostring.php
	 * @return string the full name of this collection.
	 */
	public function __toString () {}

	/**
	 * (PECL mongo &gt;=1.0.2)<br/>
	 * Gets a collection
	 * @link http://php.net/manual/en/mongocollection.get.php
	 * @param string $name <p>
	 * The next string in the collection name.
	 * </p>
	 * @return MongoCollection the collection.
	 */
	public function __get ($name) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns this collection&#x00027;s name
	 * @link http://php.net/manual/en/mongocollection.getname.php
	 * @return string the name of this collection.
	 */
	public function getName () {}

	/**
	 * (PECL mongo &gt;=1.1.0)<br/>
	 * Get slaveOkay setting for this collection
	 * @link http://php.net/manual/en/mongocollection.getslaveokay.php
	 * @return bool the value of slaveOkay for this instance.
	 */
	public function getSlaveOkay () {}

	/**
	 * (PECL mongo &gt;=1.1.0)<br/>
	 * Change slaveOkay setting for this collection
	 * @link http://php.net/manual/en/mongocollection.setslaveokay.php
	 * @param bool $ok [optional] <p>
	 * If reads should be sent to secondary members of a replica set for all
	 * possible queries using this <b>MongoCollection</b>
	 * instance.
	 * </p>
	 * @return bool the former value of slaveOkay for this instance.
	 */
	public function setSlaveOkay ($ok = true) {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Get the read preference for this collection
	 * @link http://php.net/manual/en/mongocollection.getreadpreference.php
	 * @return array
	 */
	public function getReadPreference () {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Set the read preference for this collection
	 * @link http://php.net/manual/en/mongocollection.setreadpreference.php
	 * @param string $read_preference
	 * @param array $tags [optional]
	 * @return bool
	 */
	public function setReadPreference ($read_preference, array $tags = null) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Validates this collection
	 * @link http://php.net/manual/en/mongocollection.validate.php
	 * @param bool $scan_data [optional] <p>
	 * Only validate indices, not the base collection.
	 * </p>
	 * @return array the database&#x00027;s evaluation of this object.
	 */
	public function validate ($scan_data = '&false;') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Inserts a document into the collection
	 * @link http://php.net/manual/en/mongocollection.insert.php
	 * @param array|object $a <p>
	 * An array or object. If an object is used, it may not have protected or
	 * private properties.
	 * </p>
	 * <p>
	 * If the parameter does not have an _id key or
	 * property, a new <b>MongoId</b> instance will be created
	 * and assigned to it. This special behavior does not mean that the
	 * parameter is passed by reference.
	 * </p>
	 * @param array $options [optional] <p>
	 * Options for the insert.
	 * <p>"fsync"</p><p>Boolean, defaults to <b>FALSE</b>. Forces the insert to be synced to disk before returning success. If <b>TRUE</b>, an acknowledged insert is implied and will override setting w to 0.</p>
	 * <p>"j"</p><p>Boolean, defaults to <b>FALSE</b>. Forces the insert to be synced to the journal before returning success. If <b>TRUE</b>, an acknowledged insert is implied and will override setting w to 0.</p>
	 * <p>"w"</p><p>See WriteConcerns. The default value for <b>MongoClient</b> is 1.</p>
	 * <p>"wtimeout"</p><p>How long to wait for WriteConcern acknowledgement. The default value for <b>MongoClient</b> is 10000 milliseconds.</p>
	 * <p>"safe"</p><p>Deprecated. Please use the WriteConcern w option.</p>
	 * <p>"timeout"</p><p>Integer, defaults to MongoCursor::$timeout. If acknowledged writes are used, this sets how long (in milliseconds) for the client to wait for a database response. If the database does not respond within the timeout period, a <b>MongoCursorTimeoutException</b> will be thrown.</p>
	 * </p>
	 * @return bool|array an array containing the status of the insertion if the
	 * "w" option is set. Otherwise, returns <b>TRUE</b> if the
	 * inserted array is not empty (a <b>MongoException</b> will be
	 * thrown if the inserted array is empty).
	 * </p>
	 * <p>
	 * If an array is returned, the following keys may be present:
	 * <i>ok</i>
	 * <p>
	 * This should almost always be 1 (unless last_error itself failed).
	 * </p>
	 * <i>err</i>
	 * <p>
	 * If this field is non-null, an error occurred on the previous operation.
	 * If this field is set, it will be a string describing the error that
	 * occurred.
	 * </p>
	 * <i>code</i>
	 * <p>
	 * If a database error occurred, the relevant error code will be passed
	 * back to the client.
	 * </p>
	 * <i>errmsg</i>
	 * <p>
	 * This field is set if something goes wrong with a database command. It
	 * is coupled with ok being 0. For example, if
	 * w is set and times out, errmsg will be set to "timed
	 * out waiting for slaves" and ok will be 0. If this
	 * field is set, it will be a string describing the error that occurred.
	 * </p>
	 * <i>n</i>
	 * <p>
	 * If the last operation was an update, upsert, or a remove, the number
	 * of documents affected will be returned. For insert operations, this value
	 * is always 0.
	 * </p>
	 * <i>wtimeout</i>
	 * <p>
	 * If the previous option timed out waiting for replication.
	 * </p>
	 * <i>waited</i>
	 * <p>
	 * How long the operation waited before timing out.
	 * </p>
	 * <i>wtime</i>
	 * <p>
	 * If w was set and the operation succeeded, how long it took to
	 * replicate to w servers.
	 * </p>
	 * <i>upserted</i>
	 * <p>
	 * If an upsert occurred, this field will contain the new record's
	 * _id field. For upserts, either this field or
	 * updatedExisting will be present (unless an error
	 * occurred).
	 * </p>
	 * <i>updatedExisting</i>
	 * <p>
	 * If an upsert updated an existing element, this field will be true. For
	 * upserts, either this field or upserted will be present (unless an error
	 * occurred).
	 * </p>
	 */
	public function insert ($a, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Inserts multiple documents into this collection
	 * @link http://php.net/manual/en/mongocollection.batchinsert.php
	 * @param array $a <p>
	 * An array of arrays or objects. If any objects are used, they may not have
	 * protected or private properties.
	 * </p>
	 * <p>
	 * If the documents to insert do not have an _id key or
	 * property, a new <b>MongoId</b> instance will be created
	 * and assigned to it. See <b>MongoCollection::insert</b> for
	 * additional information on this behavior.
	 * </p>
	 * @param array $options [optional] <p>
	 * Options for the inserts.
	 * <p>
	 * "continueOnError"
	 * </p>
	 * <p>
	 * Boolean, defaults to <b>FALSE</b>. If set, the database will not stop
	 * processing a bulk insert if one fails (eg due to duplicate IDs).
	 * This makes bulk insert behave similarly to a series of single
	 * inserts, except that calling <b>MongoDB::lastError</b>
	 * will have an error set if any insert fails, not just the last one.
	 * If multiple errors occur, only the most recent will be reported by
	 * <b>MongoDB::lastError</b>.
	 * </p>
	 * <p>
	 * Please note that continueOnError affects errors
	 * on the database side only. If you try to insert a document that has
	 * errors (for example it contains a key with an empty name), then the
	 * document is not even transferred to the database as the driver
	 * detects this error and bails out.
	 * continueOnError has no effect on errors detected
	 * in the documents by the driver.
	 * </p>
	 * @return mixed If the w parameter is set to acknowledge the write,
	 * returns an associative array with the status of the inserts ("ok") and any
	 * error that may have occurred ("err"). Otherwise, returns <b>TRUE</b> if the
	 * batch insert was successfully sent, <b>FALSE</b> otherwise.
	 */
	public function batchInsert (array $a, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Update records based on a given criteria
	 * @link http://php.net/manual/en/mongocollection.update.php
	 * @param array $criteria <p>
	 * Description of the objects to update.
	 * </p>
	 * @param array $new_object <p>
	 * The object with which to update the matching records.
	 * </p>
	 * @param array $options [optional] <p>
	 * This parameter is an associative array of the form
	 * array("optionname" => &lt;boolean&gt;, ...). Currently
	 * supported options are:
	 * <p>"w"</p><p>See WriteConcerns. The default value for <b>MongoClient</b> is 1.</p>
	 * <p>
	 * "upsert"
	 * </p>
	 * <p>
	 * If no document matches <i>$criteria</i>, a new
	 * document will be inserted.
	 * </p>
	 * <p>
	 * If a new document would be inserted and
	 * <i>$new_object</i> contains atomic modifiers
	 * (i.e. $ operators), those operations will be
	 * applied to the <i>$criteria</i> parameter to create
	 * the new document. If <i>$new_object</i> does not
	 * contain atomic modifiers, it will be used as-is for the inserted
	 * document. See the upsert examples below for more information.
	 * </p>
	 * @return bool|array an array containing the status of the update if the
	 * "w" option is set. Otherwise, returns <b>TRUE</b>.
	 * </p>
	 * <p>
	 * Fields in the status array are described in the documentation for
	 * <b>MongoCollection::insert</b>.
	 */
	public function update (array $criteria, array $new_object, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Update a document and return it
	 * @link http://php.net/manual/en/mongocollection.findandmodify.php
	 * @param array $query <p>
	 * The query criteria to search for.
	 * </p>
	 * @param array $update [optional] <p>
	 * The update criteria.
	 * </p>
	 * @param array $fields [optional] <p>
	 * Optionally only return these fields.
	 * </p>
	 * @param array $options [optional] <p>
	 * An array of options to apply, such as remove the match document from the
	 * DB and return it.
	 * <tr valign="top">
	 * <td>Option</td>
	 * <td>Description</td>
	 * </tr>
	 * <tr valign="top">
	 * <td>sort array</td>
	 * <td>
	 * Determines which document the operation will modify if the
	 * query selects multiple documents. findAndModify will modify the
	 * first document in the sort order specified by this argument.
	 * </td>
	 * </tr>
	 * <tr valign="top">
	 * <td>remove boolean</td>
	 * <td>
	 * Optional if update field exists. When <b>TRUE</b>, removes the selected
	 * document. The default is <b>FALSE</b>.
	 * </td>
	 * </tr>
	 * <tr valign="top">
	 * <td>update array</td>
	 * <td>
	 * Optional if remove field exists.
	 * Performs an update of the selected document.
	 * </td>
	 * </tr>
	 * <tr valign="top">
	 * <td>new boolean</td>
	 * <td>
	 * Optional. When <b>TRUE</b>, returns the modified document rather than the
	 * original. The findAndModify method ignores the new option for
	 * remove operations. The default is <b>FALSE</b>.
	 * </td>
	 * </tr>
	 * <tr valign="top">
	 * <td>upsert boolean</td>
	 * <td>
	 * Optional. Used in conjunction with the update field. When <b>TRUE</b>, the
	 * findAndModify command creates a new document if the query returns
	 * no documents. The default is false. In MongoDB 2.2, the
	 * findAndModify command returns <b>NULL</b> when upsert is <b>TRUE</b>.
	 * </td>
	 * </tr>
	 * <tr valign="top">
	 * <td></td>
	 * <td>
	 * </td>
	 * </tr>
	 * </p>
	 * @return array the original document, or the modified document when
	 * new is set.
	 */
	public function findAndModify (array $query, array $update = null, array $fields = null, array $options = null) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Creates an index on the given field(s), or does nothing if the index 
already exists
	 * @link http://php.net/manual/en/mongocollection.ensureindex.php
	 * @param string|array $key_keys
	 * @param array $options [optional] <p>
	 * This parameter is an associative array of the form
	 * array("optionname" => &lt;boolean&gt;, ...). Currently
	 * supported options are:
	 * <p>"w"</p><p>See WriteConcerns. The default value for <b>MongoClient</b> is 1.</p>
	 * <p>
	 * "unique"
	 * </p>
	 * <p>
	 * Create a unique index.
	 * </p>
	 * <p>
	 * A unique index cannot be created on a field if multiple existing
	 * documents do not contain the field. The field is effectively <b>NULL</b>
	 * for these documents and thus already non-unique. Sparse indexing may
	 * be used to overcome this, since it will prevent documents without the
	 * field from being indexed.
	 * </p>
	 * @return bool an array containing the status of the index creation if the
	 * "w" option is set. Otherwise, returns <b>TRUE</b>.
	 * </p>
	 * <p>
	 * Fields in the status array are described in the documentation for
	 * <b>MongoCollection::insert</b>.
	 */
	public function ensureIndex ($key_keys, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Deletes an index from this collection
	 * @link http://php.net/manual/en/mongocollection.deleteindex.php
	 * @param string|array $keys <p>
	 * Field or fields from which to delete the index.
	 * </p>
	 * @return array the database response.
	 */
	public function deleteIndex ($keys) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Delete all indices for this collection
	 * @link http://php.net/manual/en/mongocollection.deleteindexes.php
	 * @return array the database response.
	 */
	public function deleteIndexes () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns information about indexes on this collection
	 * @link http://php.net/manual/en/mongocollection.getindexinfo.php
	 * @return array This function returns an array in which each element describes an index.
	 * Elements will contain the values name for the name of
	 * the index, ns for the namespace (a combination of the
	 * database and collection name), and key for a list of all
	 * fields in the index and their ordering. Additional values may be present for
	 * special indexes, such as unique or
	 * sparse.
	 */
	public function getIndexInfo () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Counts the number of documents in this collection
	 * @link http://php.net/manual/en/mongocollection.count.php
	 * @param array $query [optional] <p>
	 * Associative array or object with fields to match.
	 * </p>
	 * @param int $limit [optional] <p>
	 * Specifies an upper limit to the number returned.
	 * </p>
	 * @param int $skip [optional] <p>
	 * Specifies a number of results to skip before starting the count.
	 * </p>
	 * @return int the number of documents matching the query.
	 */
	public function count (array $query = 'array()', $limit = 0, $skip = 0) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Saves a document to this collection
	 * @link http://php.net/manual/en/mongocollection.save.php
	 * @param array|object $a <p>
	 * Array or object to save. If an object is used, it may not have protected
	 * or private properties.
	 * </p>
	 * <p>
	 * If the parameter does not have an _id key or
	 * property, a new <b>MongoId</b> instance will be created
	 * and assigned to it. See <b>MongoCollection::insert</b> for
	 * additional information on this behavior.
	 * </p>
	 * @param array $options [optional] <p>
	 * Options for the save.
	 * <p>"fsync"</p><p>Boolean, defaults to <b>FALSE</b>. Forces the insert to be synced to disk before returning success. If <b>TRUE</b>, an acknowledged insert is implied and will override setting w to 0.</p>
	 * <p>"j"</p><p>Boolean, defaults to <b>FALSE</b>. Forces the insert to be synced to the journal before returning success. If <b>TRUE</b>, an acknowledged insert is implied and will override setting w to 0.</p>
	 * <p>"w"</p><p>See WriteConcerns. The default value for <b>MongoClient</b> is 1.</p>
	 * <p>"wtimeout"</p><p>How long to wait for WriteConcern acknowledgement. The default value for <b>MongoClient</b> is 10000 milliseconds.</p>
	 * <p>"safe"</p><p>Deprecated. Please use the WriteConcern w option.</p>
	 * <p>"timeout"</p><p>Integer, defaults to MongoCursor::$timeout. If acknowledged writes are used, this sets how long (in milliseconds) for the client to wait for a database response. If the database does not respond within the timeout period, a <b>MongoCursorTimeoutException</b> will be thrown.</p>
	 * </p>
	 * @return mixed If <i>w</i> was set, returns an array containing the status of the save.
	 * Otherwise, returns a boolean representing if the array was not empty (an empty array will not
	 * be inserted).
	 */
	public function save ($a, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Creates a database reference
	 * @link http://php.net/manual/en/mongocollection.createdbref.php
	 * @param mixed $document_or_id <p>
	 * If an array or object is given, its _id field will be
	 * used as the reference ID. If a <b>MongoId</b> or scalar
	 * is given, it will be used as the reference ID.
	 * </p>
	 * @return array a database reference array.
	 * </p>
	 * <p>
	 * If an array without an _id field was provided as the
	 * document_or_id parameter, <b>NULL</b> will be returned.
	 */
	public function createDBRef ($document_or_id) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Fetches the document pointed to by a database reference
	 * @link http://php.net/manual/en/mongocollection.getdbref.php
	 * @param array $ref <p>
	 * A database reference.
	 * </p>
	 * @return array the database document pointed to by the reference.
	 */
	public function getDBRef (array $ref) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Converts keys specifying an index to its identifying string
	 * @link http://php.net/manual/en/mongocollection.toindexstring.php
	 * @param mixed $keys <p>
	 * Field or fields to convert to the identifying string
	 * </p>
	 * @return string a string that describes the index.
	 */
	protected static function toIndexString ($keys) {}

	/**
	 * (PECL mongo &gt;=0.9.2)<br/>
	 * Performs an operation similar to SQL's GROUP BY command
	 * @link http://php.net/manual/en/mongocollection.group.php
	 * @param mixed $keys <p>
	 * Fields to group by. If an array or non-code object is passed, it will be
	 * the key used to group results.
	 * </p>
	 * <p>1.0.4+: If <i>keys</i> is an instance of
	 * <b>MongoCode</b>, <i>keys</i> will be treated as
	 * a function that returns the key to group by (see the "Passing a
	 * <i>keys</i> function" example below).
	 * </p>
	 * @param array $initial <p>
	 * Initial value of the aggregation counter object.
	 * </p>
	 * @param MongoCode $reduce <p>
	 * A function that takes two arguments (the current document and the
	 * aggregation to this point) and does the aggregation.
	 * </p>
	 * @param array $options [optional] <p>
	 * Optional parameters to the group command. Valid options include:
	 * </p>
	 * <p>
	 * "condition"
	 * </p>
	 * <p>
	 * Criteria for including a document in the aggregation.
	 * </p>
	 * @return array an array containing the result.
	 */
	public function group ($keys, array $initial, MongoCode $reduce, array $options = 'array()') {}

	/**
	 * (PECL mongo &gt;=1.2.11)<br/>
	 * Retrieve a list of distinct values for the given key across a collection.
	 * @link http://php.net/manual/en/mongocollection.distinct.php
	 * @param string $key <p>
	 * The key to use.
	 * </p>
	 * @param array $query [optional] <p>
	 * An optional query parameters
	 * </p>
	 * @return array an array of distinct values, or <b>FALSE</b> on failure
	 */
	public function distinct ($key, array $query = null) {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Perform an aggregation using the aggregation framework
	 * @link http://php.net/manual/en/mongocollection.aggregate.php
	 * @param array $pipeline <p>
	 * An array of pipeline operators, or just the first operator.
	 * </p>
	 * @param array $op [optional] <p>
	 * The second pipeline operator.
	 * </p>
	 * @param array $_ [optional] <p>
	 * Additional pipeline operators.
	 * </p>
	 * @return array The result of the aggregation as an array. The ok will
	 * be set to 1 on success, 0 on failure.
	 */
	public function aggregate (array $pipeline, array $op = null, array $_ = null) {}

}

/**
 * A database file object.
 * @link http://php.net/manual/en/class.mongogridfsfile.php
 */
class MongoGridFSFile  {
	/**
	 * @var array
	 */
	public $file;
	/**
	 * @var MongoGridFS
	 */
	protected $gridfs;


	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Create a new GridFS file
	 * @link http://php.net/manual/en/mongogridfsfile.construct.php
	 * @param MongoGridFS $gridfs <p>
	 * The parent MongoGridFS instance.
	 * </p>
	 * @param array $file <p>
	 * A file from the database.
	 * </p>
	 */
	public function __construct (MongoGridFS $gridfs, array $file) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns this file&#x00027;s filename
	 * @link http://php.net/manual/en/mongogridfsfile.getfilename.php
	 * @return string the filename.
	 */
	public function getFilename () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns this file&#x00027;s size
	 * @link http://php.net/manual/en/mongogridfsfile.getsize.php
	 * @return int this file's size
	 */
	public function getSize () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Writes this file to the filesystem
	 * @link http://php.net/manual/en/mongogridfsfile.write.php
	 * @param string $filename [optional] <p>
	 * The location to which to write the file. If none is given,
	 * the stored filename will be used.
	 * </p>
	 * @return int the number of bytes written.
	 */
	public function write ($filename = null) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns this file&#x00027;s contents as a string of bytes
	 * @link http://php.net/manual/en/mongogridfsfile.getbytes.php
	 * @return string a string of the bytes in the file.
	 */
	public function getBytes () {}

	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Returns a resource that can be used to read the stored file
	 * @link http://php.net/manual/en/mongogridfsfile.getresource.php
	 * @return stream a resource that can be used to read the file with
	 */
	public function getResource () {}

}

/**
 * Cursor for database file results.
 * @link http://php.net/manual/en/class.mongogridfscursor.php
 */
class MongoGridFSCursor extends MongoCursor implements Traversable, Iterator {
	/**
	 * @var boolean
	 */
	public static $slaveOkay;
	/**
	 * @var integer
	 */
	public static $timeout;
	protected $gridfs;


	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Create a new cursor
	 * @link http://php.net/manual/en/mongogridfscursor.construct.php
	 * @param MongoGridFS $gridfs <p>
	 * Related GridFS collection.
	 * </p>
	 * @param resource $connection <p>
	 * Database connection.
	 * </p>
	 * @param string $ns <p>
	 * Full name of database and collection.
	 * </p>
	 * @param array $query <p>
	 * Database query.
	 * </p>
	 * @param array $fields <p>
	 * Fields to return.
	 * </p>
	 */
	public function __construct (MongoGridFS $gridfs, $connection, $ns, array $query, array $fields) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Return the next file to which this cursor points, and advance the cursor
	 * @link http://php.net/manual/en/mongogridfscursor.getnext.php
	 * @return MongoGridFSFile the next file.
	 */
	public function getNext () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns the current file
	 * @link http://php.net/manual/en/mongogridfscursor.current.php
	 * @return MongoGridFSFile The current file.
	 */
	public function current () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Checks if there are any more elements in this cursor
	 * @link http://php.net/manual/en/mongocursor.hasnext.php
	 * @return bool if there is another element.
	 */
	public function hasNext () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Limits the number of results returned
	 * @link http://php.net/manual/en/mongocursor.limit.php
	 * @param int $num <p>
	 * The number of results to return.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function limit ($num) {}

	/**
	 * (PECL mongo &gt;=1.0.11)<br/>
	 * Limits the number of elements returned in one batch.
	 * @link http://php.net/manual/en/mongocursor.batchsize.php
	 * @param int $batchSize <p>
	 * The number of results to return per batch. Each batch requires a
	 * round-trip to the server.
	 * </p>
	 * <p>
	 * If <i>batchSize</i> is 2 or
	 * more, it represents the size of each batch of objects retrieved.
	 * It can be adjusted to optimize performance and limit data transfer.
	 * </p>
	 * <p>
	 * If <i>batchSize</i> is 1 or negative, it
	 * will limit of number returned documents to the absolute value of batchSize,
	 * and the cursor will be closed. For example if
	 * batchSize is -10, then the server will return a maximum
	 * of 10 documents and as many as can fit in 4MB, then close the cursor.
	 * </p>
	 * <p>
	 * A <i>batchSize</i> of 1 is special, and
	 * means the same as -1, i.e. a value of
	 * 1 makes the cursor only capable of returning
	 * one document.
	 * </p>
	 * <p>
	 * Note that this feature is different from
	 * <b>MongoCursor::limit</b> in that documents must fit within a
	 * maximum size, and it removes the need to send a request to close the cursor
	 * server-side. The batch size can be changed even after a cursor is iterated,
	 * in which case the setting will apply on the next batch retrieval.
	 * </p>
	 * <p>
	 * This cannot override MongoDB's limit on the amount of data it will return to
	 * the client (i.e., if you set batch size to 1,000,000,000, MongoDB will still
	 * only return 4-16MB of results per batch).
	 * </p>
	 * <p>
	 * To ensure consistent behavior, the rules of
	 * <b>MongoCursor::batchSize</b> and
	 * <b>MongoCursor::limit</b> behave a
	 * little complex but work "as expected". The rules are: hard limits override
	 * soft limits with preference given to <b>MongoCursor::limit</b>
	 * over <b>MongoCursor::batchSize</b>. After that, whichever is
	 * set and lower than the other will take precedence. See below.
	 * section for some examples.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function batchSize ($batchSize) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Skips a number of results
	 * @link http://php.net/manual/en/mongocursor.skip.php
	 * @param int $num <p>
	 * The number of results to skip.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function skip ($num) {}

	/**
	 * (PECL mongo &gt;=1.0.6)<br/>
	 * Sets the fields for a query
	 * @link http://php.net/manual/en/mongocursor.fields.php
	 * @param array $f <p>
	 * Fields to return (or not return).
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function fields (array $f) {}

	/**
	 * (PECL mongo &gt;=1.0.4)<br/>
	 * Adds a top-level key/value pair to a query
	 * @link http://php.net/manual/en/mongocursor.addoption.php
	 * @param string $key <p>
	 * Fieldname to add.
	 * </p>
	 * @param mixed $value <p>
	 * Value to add.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function addOption ($key, $value) {}

	/**
	 * (PECL mongo &gt;=0.9.4)<br/>
	 * Use snapshot mode for the query
	 * @link http://php.net/manual/en/mongocursor.snapshot.php
	 * @return MongoCursor this cursor.
	 */
	public function snapshot () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Sorts the results by given fields
	 * @link http://php.net/manual/en/mongocursor.sort.php
	 * @param array $fields <p>
	 * An array of fields by which to sort. Each element in the array has as
	 * key the field name, and as value either 1 for
	 * ascending sort, or -1 for descending sort.
	 * </p>
	 * <p>
	 * Each result is first sorted on the first field in the array, then (if
	 * it exists) on the second field in the array, etc. This means that the
	 * order of the fields in the <i>fields</i> array is
	 * important. See also the examples section.
	 * </p>
	 * @return MongoCursor the same cursor that this method was called on.
	 */
	public function sort (array $fields) {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Gives the database a hint about the query
	 * @link http://php.net/manual/en/mongocursor.hint.php
	 * @param mixed $index <p>
	 * Index to use for the query. If a string is passed, it should correspond
	 * to an index name. If an array or object is passed, it should correspond
	 * to the specification used to create the index (i.e. the first argument
	 * to <b>MongoCollection::ensureIndex</b>).
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function hint ($index) {}

	/**
	 * (PECL mongo &gt;=0.9.2)<br/>
	 * Return an explanation of the query, often useful for optimization and debugging
	 * @link http://php.net/manual/en/mongocursor.explain.php
	 * @return array an explanation of the query.
	 */
	public function explain () {}

	/**
	 * (PECL mongo &gt;=1.2.11)<br/>
	 * Sets arbitrary flags in case there is no method available the specific flag
	 * @link http://php.net/manual/en/mongocursor.setflag.php
	 * @param int $flag <p>
	 * Which flag to set. You can not set flag 6 (EXHAUST) as the driver does
	 * not know how to handle them. You will get a warning if you try to use
	 * this flag. For available flags, please refer to the wire protocol
	 * documentation.
	 * </p>
	 * @param bool $set [optional] <p>
	 * Whether the flag should be set (<b>TRUE</b>) or unset (<b>FALSE</b>).
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function setFlag ($flag, $set = true) {}

	/**
	 * (PECL mongo &gt;=0.9.4)<br/>
	 * Sets whether this query can be done on a secondary
	 * @link http://php.net/manual/en/mongocursor.slaveokay.php
	 * @param bool $okay [optional] <p>
	 * If it is okay to query the secondary.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function slaveOkay ($okay = true) {}

	/**
	 * (PECL mongo &gt;=0.9.4)<br/>
	 * Sets whether this cursor will be left open after fetching the last results
	 * @link http://php.net/manual/en/mongocursor.tailable.php
	 * @param bool $tail [optional] <p>
	 * If the cursor should be tailable.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function tailable ($tail = true) {}

	/**
	 * (PECL mongo &gt;=1.0.1)<br/>
	 * Sets whether this cursor will timeout
	 * @link http://php.net/manual/en/mongocursor.immortal.php
	 * @param bool $liveForever [optional] <p>
	 * If the cursor should be immortal.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function immortal ($liveForever = true) {}

	/**
	 * (PECL mongo &gt;=1.2.11)<br/>
	 * Sets whether this cursor will wait for a while for a tailable cursor to return more data
	 * @link http://php.net/manual/en/mongocursor.awaitdata.php
	 * @param bool $wait [optional] <p>
	 * If the cursor should wait for more data to become available.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function awaitData ($wait = true) {}

	/**
	 * (PECL mongo &gt;=1.2.0)<br/>
	 * If this query should fetch partial results from mongos if a shard is down
	 * @link http://php.net/manual/en/mongocursor.partial.php
	 * @param bool $okay [optional] <p>
	 * If receiving partial results is okay.
	 * </p>
	 * @return MongoCursor this cursor.
	 */
	public function partial ($okay = true) {}

	/**
	 * (PECL mongo &gt;=1.3.3)<br/>
	 * Get the read preference for this query
	 * @link http://php.net/manual/en/mongocursor.getreadpreference.php
	 * @return array
	 */
	public function getReadPreference () {}

	/**
	 * (PECL mongo &gt;=1.3.3)<br/>
	 * Set the read preference for this query
	 * @link http://php.net/manual/en/mongocursor.setreadpreference.php
	 * @param string $read_preference
	 * @param array $tags [optional]
	 * @return bool
	 */
	public function setReadPreference ($read_preference, array $tags = null) {}

	/**
	 * (PECL mongo &gt;=1.0.3)<br/>
	 * Sets a client-side timeout for this query
	 * @link http://php.net/manual/en/mongocursor.timeout.php
	 * @param int $ms <p>
	 * The number of milliseconds for the cursor to wait for a response. By
	 * default, the cursor will wait forever.
	 * </p>
	 * @return MongoCursor This cursor.
	 */
	public function timeout ($ms) {}

	/**
	 * (No version information available, might only be in SVN)<br/>
	 * Execute the query.
	 * @link http://php.net/manual/en/mongocursor.doquery.php
	 * @return void <b>NULL</b>.
	 */
	protected function doQuery () {}

	/**
	 * (PECL mongo &gt;=1.0.5)<br/>
	 * Gets the query, fields, limit, and skip for this cursor
	 * @link http://php.net/manual/en/mongocursor.info.php
	 * @return array the namespace, limit, skip, query, and fields for this cursor.
	 */
	public function info () {}

	/**
	 * (PECL mongo &gt;=0.9.6)<br/>
	 * Checks if there are documents that have not been sent yet from the database for this cursor
	 * @link http://php.net/manual/en/mongocursor.dead.php
	 * @return bool if there are more results that have not been sent to the client, yet.
	 */
	public function dead () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns the current result&#x00027;s _id
	 * @link http://php.net/manual/en/mongocursor.key.php
	 * @return string The current result&#x00027;s _id as a string.
	 */
	public function key () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Advances the cursor to the next result
	 * @link http://php.net/manual/en/mongocursor.next.php
	 * @return void <b>NULL</b>.
	 */
	public function next () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Returns the cursor to the beginning of the result set
	 * @link http://php.net/manual/en/mongocursor.rewind.php
	 * @return void <b>NULL</b>.
	 */
	public function rewind () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Checks if the cursor is reading a valid result.
	 * @link http://php.net/manual/en/mongocursor.valid.php
	 * @return bool If the current result is not null.
	 */
	public function valid () {}

	/**
	 * (PECL mongo &gt;=0.9.0)<br/>
	 * Clears the cursor
	 * @link http://php.net/manual/en/mongocursor.reset.php
	 * @return void <b>NULL</b>.
	 */
	public function reset () {}

	/**
	 * (PECL mongo &gt;=0.9.2)<br/>
	 * Counts the number of results for this query
	 * @link http://php.net/manual/en/mongocursor.count.php
	 * @param bool $foundOnly [optional] <p>
	 * Send cursor limit and skip information to the count function, if applicable.
	 * </p>
	 * @return int The number of documents returned by this cursor's query.
	 */
	public function count ($foundOnly = '&false;') {}

}

/**
 * A unique identifier created for database objects. If an object is inserted
 * into the database without an _id field, an _id field will be added to it
 * with a <b>MongoId</b> instance as its value. If the data
 * has a naturally occuring unique field (say, a username or timestamp) it is
 * fine to use this as the _id field instead, and it will not be replaced with
 * a <b>MongoId</b>.
 * @link http://php.net/manual/en/class.mongoid.php
 */
class MongoId  {
	public $id;


	/**
	 * (PECL mongo &gt;= 0.8.0)<br/>
	 * Creates a new id
	 * @link http://php.net/manual/en/mongoid.construct.php
	 * @param string $id [optional] <p>
	 * A string to use as the id. Must be 24 hexidecimal characters. If an
	 * invalid string is passed to this constructor, the constructor will ignore
	 * it and create a new id value.
	 * </p>
	 */
	public function __construct ($id = null) {}

	/**
	 * (PECL mongo &gt;= 0.8.0)<br/>
	 * Returns a hexidecimal representation of this id
	 * @link http://php.net/manual/en/mongoid.tostring.php
	 * @return string This id.
	 */
	public function __toString () {}

	/**
	 * (PECL mongo &gt;= 1.0.8)<br/>
	 * Create a dummy MongoId
	 * @link http://php.net/manual/en/mongoid.set-state.php
	 * @param array $props <p>
	 * Theoretically, an array of properties used to create the new id.
	 * However, as MongoId instances have no properties, this is not used.
	 * </p>
	 * @return MongoId A new id with the value "000000000000000000000000".
	 */
	public static function __set_state (array $props) {}

	/**
	 * (PECL mongo &gt;= 1.0.1)<br/>
	 * Gets the number of seconds since the epoch that this id was created
	 * @link http://php.net/manual/en/mongoid.gettimestamp.php
	 * @return int the number of seconds since the epoch that this id was created. There are only
	 * four bytes of timestamp stored, so <b>MongoDate</b> is a better choice
	 * for storing exact or wide-ranging times.
	 */
	public function getTimestamp () {}

	/**
	 * (PECL mongo &gt;= 1.0.8)<br/>
	 * Gets the hostname being used for this machine's ids
	 * @link http://php.net/manual/en/mongoid.gethostname.php
	 * @return string the hostname.
	 */
	public static function getHostname () {}

	/**
	 * (PECL mongo &gt;= 1.0.11)<br/>
	 * Gets the process ID
	 * @link http://php.net/manual/en/mongoid.getpid.php
	 * @return int the PID of the <b>MongoId</b>.
	 */
	public function getPID () {}

	/**
	 * (PECL mongo &gt;= 1.0.11)<br/>
	 * Gets the incremented value to create this id
	 * @link http://php.net/manual/en/mongoid.getinc.php
	 * @return int the incremented value used to create this <b>MongoId</b>.
	 */
	public function getInc () {}

}

/**
 * Represents JavaScript code for the database.
 * @link http://php.net/manual/en/class.mongocode.php
 */
class MongoCode  {
	public $code;
	public $scope;


	/**
	 * (PECL mongo &gt;= 0.8.3)<br/>
	 * Creates a new code object
	 * @link http://php.net/manual/en/mongocode.construct.php
	 * @param string $code <p>
	 * A string of code.
	 * </p>
	 * @param array $scope [optional] <p>
	 * The scope to use for the code.
	 * </p>
	 */
	public function __construct ($code, array $scope = 'array()') {}

	/**
	 * (PECL mongo &gt;= 0.8.3)<br/>
	 * Returns this code as a string
	 * @link http://php.net/manual/en/mongocode.tostring.php
	 * @return string This code, the scope is not returned.
	 */
	public function __toString () {}

}

/**
 * This class can be used to create regular expressions. Typically, these
 * expressions will be used to query the database and find matching strings.
 * More unusually, they can be saved to the database and retrieved.
 * @link http://php.net/manual/en/class.mongoregex.php
 */
class MongoRegex  {
	/**
	 * @var string
	 */
	public $regex;
	/**
	 * @var string
	 */
	public $flags;


	/**
	 * (PECL mongo &gt;= 0.8.1)<br/>
	 * Creates a new regular expression
	 * @link http://php.net/manual/en/mongoregex.construct.php
	 * @param string $regex <p>
	 * Regular expression string of the form /expr/flags.
	 * </p>
	 */
	public function __construct ($regex) {}

	/**
	 * (PECL mongo &gt;= 0.8.1)<br/>
	 * A string representation of this regular expression
	 * @link http://php.net/manual/en/mongoregex.tostring.php
	 * @return string This regular expression in the form "/expr/flags".
	 */
	public function __toString () {}

}

/**
 * Represent date objects for the database. This class should be used to save
 * dates to the database and to query for dates. For example:
 * @link http://php.net/manual/en/class.mongodate.php
 */
class MongoDate  {
	/**
	 * @var int
	 */
	public $sec;
	/**
	 * @var int
	 */
	public $usec;


	/**
	 * (PECL mongo &gt;= 0.8.1)<br/>
	 * Creates a new date.
	 * @link http://php.net/manual/en/mongodate.construct.php
	 * @param int $sec [optional] <p>
	 * Number of seconds since January 1st, 1970.
	 * </p>
	 * @param int $usec [optional] <p>
	 * Microseconds. Please be aware though that MongoDB's resolution is
	 * milliseconds and not microseconds, which means this
	 * value will be truncated to millisecond resolution.
	 * </p>
	 */
	public function __construct ($sec = 'time()', $usec = 0) {}

	/**
	 * (PECL mongo &gt;= 0.8.1)<br/>
	 * Returns a string representation of this date
	 * @link http://php.net/manual/en/mongodate.tostring.php
	 * @return string This date.
	 */
	public function __toString () {}

}

/**
 * An object that can be used to store or retrieve binary data from the database.
 * @link http://php.net/manual/en/class.mongobindata.php
 */
class MongoBinData  {
	const FUNC = 1;
	const BYTE_ARRAY = 2;
	const UUID = 3;
	const MD5 = 5;
	const CUSTOM = 128;

	/**
	 * @var string
	 */
	public $bin;
	/**
	 * @var int
	 */
	public $type;


	/**
	 * (PECL mongo &gt;= 0.8.1)<br/>
	 * Creates a new binary data object.
	 * @link http://php.net/manual/en/mongobindata.construct.php
	 * @param string $data <p>
	 * Binary data.
	 * </p>
	 * @param int $type [optional] <p>
	 * Data type.
	 * </p>
	 */
	public function __construct ($data, $type = 2) {}

	/**
	 * (PECL mongo &gt;= 0.8.1)<br/>
	 * The string representation of this binary data object.
	 * @link http://php.net/manual/en/mongobindata.tostring.php
	 * @return string the string "&lt;Mongo Binary Data&gt;". To access the contents of a
	 * <b>MongoBinData</b>, use the bin field.
	 */
	public function __toString () {}

}

/**
 * This class can be used to create lightweight links between objects in
 * different collections.
 * @link http://php.net/manual/en/class.mongodbref.php
 */
class MongoDBRef  {
	protected static $refKey;
	protected static $idKey;


	/**
	 * (PECL mongo &gt;= 0.9.0)<br/>
	 * Creates a new database reference
	 * @link http://php.net/manual/en/mongodbref.create.php
	 * @param string $collection <p>
	 * Collection name (without the database name).
	 * </p>
	 * @param mixed $id <p>
	 * The _id field of the object to which to link.
	 * </p>
	 * @param string $database [optional] <p>
	 * Database name.
	 * </p>
	 * @return array the reference.
	 */
	public static function create ($collection, $id, $database = null) {}

	/**
	 * (PECL mongo &gt;= 0.9.0)<br/>
	 * Checks if an array is a database reference
	 * @link http://php.net/manual/en/mongodbref.isref.php
	 * @param mixed $ref <p>
	 * Array or object to check.
	 * </p>
	 * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
	 */
	public static function isRef ($ref) {}

	/**
	 * (PECL mongo &gt;= 0.9.0)<br/>
	 * Fetches the object pointed to by a reference
	 * @link http://php.net/manual/en/mongodbref.get.php
	 * @param MongoDB $db <p>
	 * Database to use.
	 * </p>
	 * @param array $ref <p>
	 * Reference to fetch.
	 * </p>
	 * @return array the document to which the reference refers or <b>NULL</b> if the document
	 * does not exist (the reference is broken).
	 */
	public static function get (MongoDB $db, array $ref) {}

}

/**
 * Default Mongo exception.
 * @link http://php.net/manual/en/class.mongoexception.php
 */
class MongoException extends Exception  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

/**
 * Thrown when the driver fails to connect to the database.
 * @link http://php.net/manual/en/class.mongoconnectionexception.php
 */
class MongoConnectionException extends MongoException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

/**
 * Caused by accessing a cursor incorrectly or a error receiving a reply. Note
 * that this can be thrown by any database request that receives a reply, not
 * just queries. Writes, commands, and any other operation that sends
 * information to the database and waits for a response can throw a
 * <b>MongoCursorException</b>. The only exception is
 * new MongoClient() (creating a new connection), which will
 * only throw <b>MongoConnectionException</b>s.
 * @link http://php.net/manual/en/class.mongocursorexception.php
 */
class MongoCursorException extends MongoException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;
	private $host;
	private $fd;


	/**
	 * (PECL mongo &gt;= 1.0.0)<br/>
	 * The hostname of the server that encountered the error
	 * @link http://php.net/manual/en/mongocursorexception.gethost.php
	 * @return string the hostname, or NULL if the hostname is unknown.
	 */
	public function getHost () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

/**
 * Caused by a query timing out. You can set the length of time to wait before
 * this exception is thrown by calling
 * <b>MongoCursor::timeout</b> on the cursor or setting
 * MongoCursor::$timeout. The static variable is useful for
 * queries such as database commands and
 * <b>MongoCollection::findOne</b>, both of which implicitly use
 * cursors.
 * @link http://php.net/manual/en/class.mongocursortimeoutexception.php
 */
class MongoCursorTimeoutException extends MongoCursorException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PECL mongo &gt;= 1.0.0)<br/>
	 * The hostname of the server that encountered the error
	 * @link http://php.net/manual/en/mongocursorexception.gethost.php
	 * @return string the hostname, or NULL if the hostname is unknown.
	 */
	public function getHost () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

/**
 * Thrown when there are errors reading or writing files
 * to or from the database.
 * @link http://php.net/manual/en/class.mongogridfsexception.php
 */
class MongoGridFSException extends MongoException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

/**
 * The MongoResultException is thrown by several command helpers (such as
 * <b>MongoCollection::findAndModify</b>) in the event of
 * failure. The original result document is available through
 * <b>MongoResultException::getDocument</b>.
 * @link http://php.net/manual/en/class.mongoresultexception.php
 */
class MongoResultException extends MongoException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;
	public $document;


	/**
	 * (PECL mongo &gt;=1.3.0)<br/>
	 * Retrieve the full result document
	 * @link http://php.net/manual/en/mongoresultexception.getdocument.php
	 * @return array The full result document as an array, including partial data if available and
	 * additional keys.
	 */
	public function getDocument () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

/**
 * <b>MongoTimestamp</b> is used by sharding. If you're not
 * looking to write sharding tools, what you probably want is
 * <b>MongoDate</b>.
 * @link http://php.net/manual/en/class.mongotimestamp.php
 */
class MongoTimestamp  {
	/**
	 * @var int
	 */
	public $sec;
	/**
	 * @var int
	 */
	public $inc;


	/**
	 * (PECL mongo &gt;= 1.0.1)<br/>
	 * Creates a new timestamp.
	 * @link http://php.net/manual/en/mongotimestamp.construct.php
	 * @param int $sec [optional] <p>
	 * Number of seconds since January 1st, 1970.
	 * </p>
	 * @param int $inc [optional] <p>
	 * Increment.
	 * </p>
	 */
	public function __construct ($sec = 'time()', $inc = null) {}

	/**
	 * (PECL mongo &gt;= 1.0.1)<br/>
	 * Returns a string representation of this timestamp
	 * @link http://php.net/manual/en/mongotimestamp.tostring.php
	 * @return string The seconds since epoch represented by this timestamp.
	 */
	public function __toString () {}

}

/**
 * The class can be used to save 32-bit integers to the database on a 64-bit
 * system.
 * @link http://php.net/manual/en/class.mongoint32.php
 */
class MongoInt32  {
	/**
	 * @var string
	 */
	public $value;


	/**
	 * (PECL mongo &gt;= 1.0.9)<br/>
	 * Creates a new 32-bit integer.
	 * @link http://php.net/manual/en/mongoint32.construct.php
	 * @param string $value <p>
	 * A number.
	 * </p>
	 */
	public function __construct ($value) {}

	/**
	 * (PECL mongo &gt;= 1.0.9)<br/>
	 * Returns the string representation of this 32-bit integer.
	 * @link http://php.net/manual/en/mongoint32.tostring.php
	 * @return string the string representation of this integer.
	 */
	public function __toString () {}

}

/**
 * The class can be used to save 64-bit integers to the database on a 32-bit
 * system.
 * @link http://php.net/manual/en/class.mongoint64.php
 */
class MongoInt64  {
	/**
	 * @var string
	 */
	public $value;


	/**
	 * (PECL mongo &gt;= 1.0.9)<br/>
	 * Creates a new 64-bit integer.
	 * @link http://php.net/manual/en/mongoint64.construct.php
	 * @param string $value <p>
	 * A number.
	 * </p>
	 */
	public function __construct ($value) {}

	/**
	 * (PECL mongo &gt;= 1.0.9)<br/>
	 * Returns the string representation of this 64-bit integer.
	 * @link http://php.net/manual/en/mongoint64.tostring.php
	 * @return string the string representation of this integer.
	 */
	public function __toString () {}

}

/**
 * Logging can be used to get detailed information about what the driver is
 * doing. The logging mechanism as used by MongoLog emits all log messages
 * as a PHP notice. Depending on the server interface that you use,
 * that means that they will either be sent to strerr (with PHP-CLI), or
 * otherwise to the web server's error log. In order for log messages to
 * be output by PHP their level (E_NOTICE) does need to be configured to
 * be shown. That means the E_NOTICE bit needs to be part of PHP's
 * error_reporting level and that display_errors is set to 1.
 * @link http://php.net/manual/en/class.mongolog.php
 */
class MongoLog  {
	const NONE = 0;
	const WARNING = 1;
	const INFO = 2;
	const FINE = 4;
	const RS = 1;
	const POOL = 1;
	const PARSE = 16;
	const CON = 2;
	const IO = 4;
	const SERVER = 8;
	const ALL = 31;

	/**
	 * @var int
	 */
	private static $level;
	/**
	 * @var int
	 */
	private static $module;
	private static $callback;


	/**
	 * (PECL mongo &gt;= 1.2.3)<br/>
	 * Sets logging level
	 * @link http://php.net/manual/en/mongolog.setlevel.php
	 * @param int $level <p>
	 * The levels you would like to log.
	 * </p>
	 * @return void
	 */
	public static function setLevel ($level) {}

	/**
	 * (PECL mongo &gt;= 1.2.3)<br/>
	 * Gets the log level
	 * @link http://php.net/manual/en/mongolog.getlevel.php
	 * @return int the current level.
	 */
	public static function getLevel () {}

	/**
	 * (PECL mongo &gt;= 1.2.3)<br/>
	 * Sets driver functionality to log
	 * @link http://php.net/manual/en/mongolog.setmodule.php
	 * @param int $module <p>
	 * The module(s) you would like to log.
	 * </p>
	 * @return void
	 */
	public static function setModule ($module) {}

	/**
	 * (PECL mongo &gt;= 1.2.3)<br/>
	 * Gets the modules currently being logged
	 * @link http://php.net/manual/en/mongolog.getmodule.php
	 * @return int the modules currently being logged.
	 */
	public static function getModule () {}

	/**
	 * (PECL mongo &gt;= 1.3.0)<br/>
	 * Set a callback function to be called on events
	 * @link http://php.net/manual/en/mongolog.setcallback.php
	 * @param callable $log_function <p>
	 * The function to be called on events.
	 * </p>
	 * <p>
	 * The function should have the following prototype
	 * </p>
	 * <p>
	 * <b>log_function</b>
	 * <b>int<i>module</i></b>
	 * <b>int<i>level</i></b>
	 * <b>string<i>message</i></b>
	 * <i>module</i>
	 * One of the MongoLog
	 * module constants.
	 * @return void <b>TRUE</b> on success or <b>FALSE</b> on failure.
	 */
	public static function setCallback (callable $log_function) {}

	/**
	 * (PECL mongo &gt;= 1.3.0)<br/>
	 * Retrieve the previously set callback function name
	 * @link http://php.net/manual/en/mongolog.getcallback.php
	 * @return void the callback function name, or <b>FALSE</b> if not set yet.
	 */
	public static function getCallback () {}

}

/**
 * The current (1.3.0+) releases of the driver no longer implements pooling.
 * This class and its methods are therefore deprecated and should not be
 * used.
 * @link http://php.net/manual/en/class.mongopool.php
 */
class MongoPool  {

	/**
	 * (PECL mongo &gt;= 1.2.3)<br/>
	 * Returns information about all connection pools.
	 * @link http://php.net/manual/en/mongopool.info.php
	 * @return array Each connection pool has an identifier, which starts with the host. For each
	 * pool, this function shows the following fields:
	 * <i>in use</i>
	 * <p>
	 * The number of connections currently being used by
	 * <b>Mongo</b> instances.
	 * </p>
	 * <i>in pool</i>
	 * <p>
	 * The number of connections currently in the pool (not being used).
	 * </p>
	 * <i>remaining</i>
	 * <p>
	 * The number of connections that could be created by this pool. For
	 * example, suppose a pool had 5 connections remaining and 3 connections in
	 * the pool. We could create 8 new instances of
	 * <b>MongoClient</b> before we exhausted this pool
	 * (assuming no instances of <b>MongoClient</b> went out of
	 * scope, returning their connections to the pool).
	 * </p>
	 * <p>
	 * A negative number means that this pool will spawn unlimited connections.
	 * </p>
	 * <p>
	 * Before a pool is created, you can change the max number of connections by
	 * calling <b>Mongo::setPoolSize</b>. Once a pool is showing
	 * up in the output of this function, its size cannot be changed.
	 * </p>
	 * <i>total</i>
	 * <p>
	 * The total number of connections allowed for this pool. This should be
	 * greater than or equal to "in use" + "in pool" (or -1).
	 * </p>
	 * <i>timeout</i>
	 * <p>
	 * The socket timeout for connections in this pool. This is how long
	 * connections in this pool will attempt to connect to a server before
	 * giving up.
	 * </p>
	 * <i>waiting</i>
	 * <p>
	 * If you have capped the pool size, workers requesting connections from
	 * the pool may block until other workers return their connections. This
	 * field shows how many milliseconds workers have blocked for connections to
	 * be released. If this number keeps increasing, you may want to use
	 * <b>MongoPool::setSize</b> to add more connections to your
	 * pool.
	 * </p>
	 */
	public static function info () {}

	/**
	 * (PECL mongo &gt;= 1.2.3)<br/>
	 * Set the size for future connection pools.
	 * @link http://php.net/manual/en/mongopool.setsize.php
	 * @param int $size <p>
	 * The max number of connections future pools will be able to create.
	 * Negative numbers mean that the pool will spawn an infinite number of
	 * connections.
	 * </p>
	 * @return bool the former value of pool size.
	 */
	public static function setSize ($size) {}

	/**
	 * (PECL mongo &gt;= 1.2.3)<br/>
	 * Get pool size for connection pools
	 * @link http://php.net/manual/en/mongopool.getsize.php
	 * @return int the current pool size.
	 */
	public static function getSize () {}

}

/**
 * <b>MongoMaxKey</b> is a special type used by the database
 * that evaluates to greater than any other type. Thus, if a query is sorted
 * by a given field in ascending order, any document with a
 * <b>MongoMaxKey</b> as its value will be returned last.
 * @link http://php.net/manual/en/class.mongomaxkey.php
 */
class MongoMaxKey  {
}

/**
 * <b>MongoMinKey</b> is a special type used by the database
 * that evaluates to less than any other type. Thus, if a query is sorted by a
 * given field in ascending order, any document with a
 * <b>MongoMinKey</b> as its value will be returned first.
 * @link http://php.net/manual/en/class.mongominkey.php
 */
class MongoMinKey  {
}

/**
 * (PECL mongo &gt;=1.0.1)<br/>
 * Serializes a PHP variable into a BSON string
 * @link http://php.net/manual/en/function.bson-encode.php
 * @param mixed $anything <p>
 * The variable to be serialized.
 * </p>
 * @return string the serialized string.
 */
function bson_encode ($anything) {}

/**
 * (PECL mongo &gt;=1.0.1)<br/>
 * Deserializes a BSON object into a PHP array
 * @link http://php.net/manual/en/function.bson-decode.php
 * @param string $bson <p>
 * The BSON to be deserialized.
 * </p>
 * @return array the deserialized BSON object.
 */
function bson_decode ($bson) {}

define ('MONGO_STREAMS', 1);

// End of mongo v.1.4.3
?>
