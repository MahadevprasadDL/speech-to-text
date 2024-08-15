SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- DB name `users`

INSERT INTO `users` (`userid`, `username`, `email`, `password`) VALUES
(1, 'dfdfdf', 'dfdf@fgfg', 'c20ad4d76fe97759aa27a0c99bff6710'),
(2, 'ra', 'ra@gmail.com', 'db26ee047a4c86fbd2fba73503feccb6'),
(3, 'rabbani', 'rabbani@gmail', 'c20ad4d76fe97759aa27a0c99bff6710'),
(4, 'd', 'd@gmail', 'c4ca4238a0b923820dcc509a6f75849b'),
(5, 'rabbani1', 'rabbani@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710');

ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
