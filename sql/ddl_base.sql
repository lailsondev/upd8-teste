-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/07/2025 às 22:27
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `upd8_teste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Salvador', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(2, 'Lauro de Freitas', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(3, 'Camaçari', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(4, 'Simões Filho', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(5, 'Dias d''Ávila', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(6, 'Mata de São João', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(7, 'Vera Cruz', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(8, 'Itaparica', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(9, 'São Francisco do Conde', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(10, 'Candeias', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(11, 'Madre de Deus', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(12, 'Pojuca', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(13, 'São Sebastião do Passé', 'BA', '2025-07-13 22:55:10', '2025-07-13 22:55:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `cpf`, `nome`, `data_nascimento`, `sexo`, `endereco`, `cidade_id`, `created_at`, `updated_at`) VALUES
(1, '111.222.333-44', 'João da Silva', '1985-03-15', 'M', 'Rua do Comércio, 100', 1, '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(2, '555.666.777-88', 'Maria Oliveira', '1992-07-20', 'F', 'Avenida Oceânica, 500', 1, '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(3, '999.888.777-66', 'Pedro Rocha', '1978-11-05', 'M', 'Condomínio Sol Nascente, Bloco B', 2, '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(4, '123.456.789-00', 'Juliana Souza', '1998-01-25', 'F', 'Rua das Flores, 30', 3, '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(5, '000.111.222-33', 'Rafaela Dantas', '1980-09-10', 'F', 'Travessa da Paz, 70', 4, '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(6, '12312312312', 'Lailson Teste', '1992-10-14', 'M', 'Rua Terencio Pereira', 6, '2025-07-13 23:01:15', '2025-07-13 23:01:15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_07_13_173559_create_cidades_table', 1),
(6, '2025_07_13_173835_create_representantes_table', 1),
(7, '2025_07_13_174041_create_clientes_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `representantes`
--

CREATE TABLE `representantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `cidade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `representantes`
--

INSERT INTO `representantes` (`id`, `nome`, `email`, `telefone`, `cidade_id`, `created_at`, `updated_at`) VALUES
(1, 'Carlos Santos', 'carlos.santos@example.com', '71987654321', 1, '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(2, 'Ana Paula Costa', 'ana.paula@example.com', '71912345678', 1, '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(3, 'Fernanda Lima', 'fernanda.lima@example.com', '71998765432', 2, '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(4, 'Roberto Almeida', 'roberto.almeida@example.com', '71981234567', 3, '2025-07-13 22:55:10', '2025-07-13 22:55:10'),
(5, 'Patrícia Gomes', 'patricia.gomes@example.com', '71992345678', 4, '2025-07-13 22:55:10', '2025-07-13 22:55:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientes_cpf_unique` (`cpf`),
  ADD KEY `clientes_cidade_id_foreign` (`cidade_id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `representantes_email_unique` (`email`),
  ADD KEY `representantes_cidade_id_foreign` (`cidade_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_cidade_id_foreign` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`);

--
-- Restrições para tabelas `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `representantes_cidade_id_foreign` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
