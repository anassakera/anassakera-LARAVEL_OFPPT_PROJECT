-- جدول types: =======================================================================

-- Create
INSERT INTO types (name, typeparent_id) VALUES ('نوع جديد', 'معرف النوع الأب');

-- Read
SELECT * FROM types;
SELECT * FROM types WHERE id = 'معرف النوع';

-- Update
UPDATE types SET name = 'اسم النوع المحدث', typeparent_id = 'معرف النوع الأب الجديد' WHERE id = 'معرف النوع';

-- Delete
DELETE FROM types WHERE id = 'معرف النوع';


-- جدول marques: =======================================================================

-- Create
INSERT INTO marques (name) VALUES ('اسم العلامة التجارية');

-- Read
SELECT * FROM marques;
SELECT * FROM marques WHERE id = 'معرف العلامة التجارية';

-- Update
UPDATE marques SET name = 'اسم العلامة التجارية المحدث' WHERE id = 'معرف العلامة التجارية';

-- Delete
DELETE FROM marques WHERE id = 'معرف العلامة التجارية';


-- جدول classes: =======================================================================

-- Create
INSERT INTO classes (name, estalishement_id) VALUES ('اسم الفصل', 'معرف المؤسسة');

-- Read
SELECT * FROM classes;
SELECT * FROM classes WHERE id = 'معرف الفصل';

-- Update
UPDATE classes SET name = 'اسم الفصل المحدث', estalishement_id = 'معرف المؤسسة الجديد' WHERE id = 'معرف الفصل';

-- Delete
DELETE FROM classes WHERE id = 'معرف الفصل';

-- جدول establishments: =======================================================================

-- Create
INSERT INTO establishments (name) VALUES ('اسم المؤسسة');

-- Read
SELECT * FROM establishments;
SELECT * FROM establishments WHERE id = 'معرف المؤسسة';

-- Update
UPDATE establishments SET name = 'اسم المؤسسة المحدث' WHERE id = 'معرف المؤسسة';

-- Delete
DELETE FROM establishments WHERE id = 'معرف المؤسسة';

-- جدول devices: =======================================================================

-- Create
INSERT INTO devices (name, class_id, marque_id, type_id, model_id) VALUES ('اسم الجهاز', 'معرف الفصل', 'معرف العلامة التجارية', 'معرف النوع', 'معرف الموديل');

-- Read
SELECT * FROM devices;
SELECT * FROM devices WHERE id = 'معرف الجهاز';

-- Update
UPDATE devices SET name = 'اسم الجهاز المحدث', class_id = 'معرف الفصل الجديد', marque_id = 'معرف العلامة التجارية الجديد', type_id = 'معرف النوع الجديد', model_id = 'معرف الموديل الجديد' WHERE id = 'معرف الجهاز';

-- Delete
DELETE FROM devices WHERE id = 'معرف الجهاز';


-- من الملف ofppt.sql أعطني كود SQL لإنشاء الجداول
-- types, marques, classes, establishments, devices
-- مع العلاقات الخاصة بهم فقط 

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `typeparent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `marques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `estalishement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `establishments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `marque_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `types_typeparent_id_foreign` (`typeparent_id`);

ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_estalishement_id_foreign` (`estalishement_id`);

ALTER TABLE `establishments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devices_class_id_foreign` (`class_id`),
  ADD KEY `devices_marque_id_foreign` (`marque_id`),
  ADD KEY `devices_type_id_foreign` (`type_id`);


ALTER TABLE `types`
  ADD CONSTRAINT `types_typeparent_id_foreign` FOREIGN KEY (`typeparent_id`) REFERENCES `types` (`id`);

ALTER TABLE `classes`
  ADD CONSTRAINT `classes_estalishement_id_foreign` FOREIGN KEY (`estalishement_id`) REFERENCES `establishments` (`id`);

ALTER TABLE `devices`
  ADD CONSTRAINT `devices_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `devices_marque_id_foreign` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`id`),
  ADD CONSTRAINT `devices_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

