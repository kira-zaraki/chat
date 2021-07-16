<?php 


/**
 * 
 */
 class init extends Model
 {
 	public $resuls=array();
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function build_DB(){
 		 $user  = [
 		 		"CREATE TABLE IF NOT EXISTS `user` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `nom` varchar(50) NOT NULL,
				  `prenom` varchar(50) NOT NULL,
				  `email` varchar(100) NOT NULL,
				  `username` varchar(50) NOT NULL,
				  `password` text NOT NULL,
				  `csrf_token` text,
				  `status` varchar(10) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;",
 		 		"CREATE TABLE IF NOT EXISTS `conversation` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `id_sender` int(11) NOT NULL,
				  `id_receiver` int(11) NOT NULL,
				  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  `checked` tinyint(1) NOT NULL DEFAULT '0',
				  `message` text NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;",
 		 		];	
		  $this->build($user);
		  echo "BUILD DB DONE";
		  echo "<br>";	
		  echo "<br>";	
 	}

 	public function insert_DB(){
 		 $user  = [
 		 		"INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `username`, `password`, `csrf_token`, `status`) VALUES
					(1, 'lorem', 'ipsum', 'lorem@gmail.com', 'lorem-ipsum', '202cb962ac59075b964b07152d234b70', '123', 'offline'),
					(2, 'ipsum', 'dolor', 'dolor@gmail.com', 'doloripsum', '123', '123', 'online'),
					(5, 'karim', 'sakoufa7', 'exemple@gmail.com', 'azez', 'azer', NULL, 'offline');
					COMMIT;",
 		 		"INSERT INTO `conversation` (`id`, `id_sender`, `id_receiver`, `date`, `checked`, `message`) VALUES
					(1, 1, 2, '2021-07-01 14:43:51', 0, 'bonsoir'),
					(2, 2, 1, '2021-07-01 14:43:52', 0, 'bonne nuit'),
					(3, 1, 2, '2021-07-01 18:09:49', 0, 'lorem ipsum dolor'),
					(4, 2, 1, '2021-07-01 18:09:49', 0, 'ipsum dolor test test'),
					(5, 1, 2, '2021-07-01 18:10:17', 0, 'test test test test '),
					(6, 2, 1, '2021-07-01 18:10:17', 0, 'lorem test test test test dolor'),
					(13, 1, 2, '2021-07-02 21:04:39', 0, 'exemple'),
					(12, 1, 2, '2021-07-02 21:03:17', 0, 'lorem ipsum'),
					(11, 1, 2, '2021-07-02 21:01:59', 0, 'lorem ipsum'),
					(14, 1, 2, '2021-07-02 21:04:49', 0, 'chi haja 2'),
					(15, 2, 1, '2021-07-03 12:33:30', 0, 'Bonsoir le mercrediii'),
					(16, 1, 2, '2021-07-03 12:33:41', 0, 'ahlan labasss'),
					(17, 1, 2, '2021-07-03 17:04:11', 0, 'test'),
					(63, 2, 1, '2021-07-06 15:20:32', 0, 'test'),
					(58, 2, 1, '2021-07-06 15:11:37', 0, 'ddddd'),
					(59, 2, 1, '2021-07-06 15:12:18', 0, 'eeee'),
					(60, 2, 1, '2021-07-06 15:12:30', 0, 'pppppp'),
					(61, 2, 1, '2021-07-06 15:12:42', 0, 'awaaaaaaaaaaaaaaaa'),
					(62, 2, 1, '2021-07-06 15:13:31', 0, 'lorem ipsum'),
					(53, 2, 1, '2021-07-06 14:44:43', 0, 'asdf'),
					(54, 2, 1, '2021-07-06 15:07:07', 0, 'lorem'),
					(55, 2, 1, '2021-07-06 15:07:48', 0, 'zzzzz'),
					(56, 2, 1, '2021-07-06 15:08:46', 0, 'zzzz'),
					(57, 2, 1, '2021-07-06 15:10:16', 0, 'eeee'),
					(44, 2, 1, '2021-07-06 14:30:06', 0, 'exemple'),
					(64, 5, 1, '2021-07-09 15:58:41', 0, 'awa'),
					(65, 5, 1, '2021-07-09 16:01:58', 0, 'exemple'),
					(66, 1, 2, '2021-07-09 17:08:58', 0, 'salam'),
					(67, 1, 2, '2021-07-09 19:19:56', 0, 'awaaaaa'),
					(86, 2, 1, '2021-07-13 17:15:39', 0, 'Hello'),
					(81, 1, 2, '2021-07-13 16:26:51', 0, 'exemple'),
					(88, 1, 2, '2021-07-13 17:16:04', 0, 'labass'),
					(87, 1, 2, '2021-07-13 17:15:46', 0, 'hania'),
					(89, 2, 1, '2021-07-13 17:16:15', 0, 'mzayan wnta');
					COMMIT;",
 		 		];	
		  $this->build($user);	
		  echo "DATA INSERT DONE";
 	}

 }

 ?>