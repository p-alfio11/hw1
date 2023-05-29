
--
-- Database: `hw1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Commenti`
--

CREATE TABLE `Commenti` (
  `id` int(11) NOT NULL,
  `Commento` varchar(512) NOT NULL,
  `Data` datetime NOT NULL DEFAULT current_timestamp(),
  `Email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `Piace`
--

CREATE TABLE `Piace` (
  `Email` varchar(256) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `Post`
--

CREATE TABLE `Post` (
  `Email` varchar(256) NOT NULL,
  `FileDestinazione` varchar(256) NOT NULL,
  `Titolo` varchar(256) NOT NULL,
  `Descrizione` varchar(256) NOT NULL,
  `Id` int(11) NOT NULL,
  `Data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `Preferiti`
--

CREATE TABLE `Preferiti` (
  `Email` varchar(256) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `Utenti`
--

CREATE TABLE `Utenti` (
  `Email` varchar(256) NOT NULL,
  `Pass` varchar(256) NOT NULL,
  `Nome` varchar(256) NOT NULL,
  `Cognome` varchar(256) NOT NULL,
  `Telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle `Commenti`
--
ALTER TABLE `Commenti`
  ADD PRIMARY KEY (`id`,`Email`,`Data`) USING BTREE,
  ADD KEY `Email` (`Email`);

--
-- Indici per le tabelle `Piace`
--
ALTER TABLE `Piace`
  ADD PRIMARY KEY (`Email`,`id`),
  ADD KEY `id` (`id`);

--
-- Indici per le tabelle `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`Id`,`Email`) USING BTREE,
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `Email` (`Email`);

--
-- Indici per le tabelle `Preferiti`
--
ALTER TABLE `Preferiti`
  ADD PRIMARY KEY (`Email`,`id`),
  ADD KEY `id` (`id`);

--
-- Indici per le tabelle `Utenti`
--
ALTER TABLE `Utenti`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT per la tabella `Post`
--
ALTER TABLE `Post`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per la tabella `Commenti`
--
ALTER TABLE `Commenti`
  ADD CONSTRAINT `commenti_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Post` (`Id`),
  ADD CONSTRAINT `commenti_ibfk_2` FOREIGN KEY (`Email`) REFERENCES `Utenti` (`Email`);

--
-- Limiti per la tabella `Piace`
--
ALTER TABLE `Piace`
  ADD CONSTRAINT `piace_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `Utenti` (`Email`),
  ADD CONSTRAINT `piace_ibfk_2` FOREIGN KEY (`id`) REFERENCES `Post` (`Id`);

--
-- Limiti per la tabella `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `Utenti` (`Email`);

--
-- Limiti per la tabella `Preferiti`
--
ALTER TABLE `Preferiti`
  ADD CONSTRAINT `preferiti_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `Utenti` (`Email`),
  ADD CONSTRAINT `preferiti_ibfk_2` FOREIGN KEY (`id`) REFERENCES `Post` (`Id`);
COMMIT;


