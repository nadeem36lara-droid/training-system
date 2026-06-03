# University Training Management System

## Project Vision

نظام أكاديمي وتدريبي احترافي متعدد المؤسسات التعليمية في العراق.

يدعم:

- الجامعات الحكومية
- الجامعات الأهلية
- الكليات
- المعاهد
- مراكز التدريب

يعمل باللغتين:

- العربية
- الإنجليزية

ويعتمد تصميماً حديثاً وقابلاً للتوسع.

---

# User Roles

## System Administrator

يمتلك جميع الصلاحيات.

## Institution Administrator

إدارة المؤسسة التعليمية.

## Registration Officer

إدارة تسجيل الطلبة.

## Academic Affairs

إدارة المسارات الأكاديمية.

## Training Officer

إدارة البرامج التدريبية.

## Instructor

إدارة المحاضرات والدرجات.

## Student

الوصول إلى ملفه الشخصي ونتائجه.

---

# Academic Systems

يدعم النظام:

## Annual System

النظام السنوي.

## Semester System

الفصل الأول والفصل الثاني.

## Course System

نظام الكورسات.

---

# Main Modules

## Institutions

إدارة المؤسسات التعليمية.

## Colleges

إدارة الكليات.

## Departments

إدارة الأقسام.

## Academic Years

إدارة السنوات الدراسية.

## Academic Stages

المراحل الدراسية.

## Students

إدارة الطلبة.

## Instructors

إدارة التدريسيين.

## Courses

إدارة المواد الدراسية.

## Training Programs

إدارة البرامج التدريبية.

## Student Registration

تسجيل الطلبة.

## Attendance

الحضور والغياب.

## Grades

الدرجات.

## Certificates

الشهادات.

## Reports

التقارير.

## Users

المستخدمون.

## Roles & Permissions

الصلاحيات.

## Settings

الإعدادات العامة.

---

# Development Strategy

تنفيذ المشروع بطريقة Module By Module.

كل Module يتم إنجازه بشكل نهائي قبل الانتقال إلى الذي يليه.

---

# Current Progress

## Completed

- Laravel Installation
- Database Configuration
- GitHub Repository
- Student Basic CRUD
- DataTables Integration

## In Progress

- Academic Student Profile Module


---

# Chapter 2: Academic Structure Analysis

## Purpose

This chapter defines the academic structure of the system.

The system must support different types of educational institutions in Iraq, including:

- Public universities
- Private universities
- Colleges
- Institutes
- Training centers

The design must support:

- Diploma
- Bachelor
- Master
- PhD

The system should be flexible enough to support annual, semester-based, and course-based study systems.

---

# Academic Hierarchy

The academic structure follows this hierarchy:

Institution
↓
College
↓
Department
↓
Academic Program
↓
Study Level
↓
Academic System
↓
Academic Stage / Semester
↓
Student

---

# 1. Institutions

Represents the educational organization.

Examples:

- University of Basra
- Al-Kunooze University
- Technical Institute
- Training Center

## Table: institutions

Fields:

- id
- code
- name_ar
- name_en
- type
- logo
- address
- phone
- email
- website
- status
- created_at
- updated_at

## Notes

The system will start as a single-institution system, but the database design should allow future expansion to multi-institution support.

---

# 2. Colleges

Represents colleges within an institution.

Examples:

- College of Engineering
- College of Administration and Economics
- College of Law
- College of Nursing

## Table: colleges

Fields:

- id
- institution_id
- code
- name_ar
- name_en
- dean_name
- phone
- email
- status
- created_at
- updated_at

## Relationships

- Institution has many colleges.
- College belongs to institution.
- College has many departments.

---

# 3. Departments

Represents academic departments within colleges.

Examples:

- Computer Engineering
- Accounting
- Law
- Nursing

## Table: departments

Fields:

- id
- college_id
- code
- name_ar
- name_en
- head_name
- phone
- email
- status
- created_at
- updated_at

## Relationships

- College has many departments.
- Department belongs to college.
- Department has many academic programs.

---

# 4. Study Levels

Represents the academic qualification level.

Examples:

- Diploma
- Bachelor
- Master
- PhD

## Table: study_levels

Fields:

- id
- code
- name_ar
- name_en
- status
- created_at
- updated_at

## Notes

This allows the system to support undergraduate and postgraduate studies without changing the database structure later.

---

# 5. Academic Systems

Represents the study system used by a program.

Examples:

- Annual
- Semester
- Courses

## Table: academic_systems

Fields:

- id
- code
- name_ar
- name_en
- description
- status
- created_at
- updated_at

## Notes

Different departments or programs may use different academic systems.

Example:

- Law may use annual system.
- Engineering may use semester or course system.
- Postgraduate programs may use courses.

---

# 6. Study Types

Represents the study shift/type.

Examples:

- Morning
- Evening

## Table: study_types

Fields:

- id
- code
- name_ar
- name_en
- status
- created_at
- updated_at

---

# 7. Academic Programs

Represents the actual program of study.

Examples:

- Bachelor of Computer Engineering
- Diploma in Accounting
- Master of Computer Science
- PhD in Law

## Table: academic_programs

Fields:

- id
- department_id
- study_level_id
- academic_system_id
- code
- name_ar
- name_en
- duration_years
- total_units
- status
- created_at
- updated_at

## Relationships

- Department has many academic programs.
- Academic program belongs to department.
- Academic program belongs to study level.
- Academic program belongs to academic system.
- Academic program has many students.
- Academic program has many subjects.

---

# 8. Academic Years

Represents the academic year.

Examples:

- 2025-2026
- 2026-2027

## Table: academic_years

Fields:

- id
- name
- start_date
- end_date
- is_current
- status
- created_at
- updated_at

## Notes

Only one academic year should be marked as current.

---

# 9. Academic Stages

Represents the study stage or year level.

Examples:

- First Stage
- Second Stage
- Third Stage
- Fourth Stage
- Fifth Stage
- Sixth Stage

## Table: academic_stages

Fields:

- id
- code
- name_ar
- name_en
- stage_no
- status
- created_at
- updated_at

## Notes

Stages are used mainly in annual and undergraduate systems.

---

# 10. Semesters

Represents semesters inside an academic year.

Examples:

- First Semester
- Second Semester
- Summer Semester

## Table: semesters

Fields:

- id
- academic_year_id
- code
- name_ar
- name_en
- semester_no
- start_date
- end_date
- status
- created_at
- updated_at

## Relationships

- Academic year has many semesters.
- Semester belongs to academic year.

---

# 11. Student Academic Placement

Each student should be linked to:

- institution_id
- college_id
- department_id
- academic_program_id
- study_level_id
- academic_system_id
- study_type_id
- academic_year_id
- academic_stage_id
- semester_id nullable

## Notes

The student should not store college or department as text.

Instead, the student should store foreign keys.

This prevents duplication, spelling mistakes, and reporting issues.

---

# 12. Design Rules

## Rule 1

Do not store academic structure names as plain text inside the students table.

Use foreign keys.

## Rule 2

The system must support annual, semester, and course-based study systems.

## Rule 3

The system must support postgraduate studies without redesigning the database.

## Rule 4

Every main table must include:

- status
- created_at
- updated_at

## Rule 5

Every CRUD module must include:

- Migration
- Model
- Relationships
- Controller
- Validation
- Routes
- Bootstrap RTL Views
- DataTables
- Create Page
- Edit Page
- Show Page
- Delete Action
- Status Badges

---

# Implementation Priority

The academic structure should be implemented in this order:

1. institutions
2. colleges
3. departments
4. study_levels
5. academic_systems
6. study_types
7. academic_programs
8. academic_years
9. academic_stages
10. semesters

After completing these modules, the students table should be refactored to use foreign keys instead of text fields.

---

# Cursor Execution Notes

Cursor should not generate the entire system at once.

Cursor should implement one module at a time.

Each module must be reviewed, tested, committed to GitHub, then the next module begins.

First Cursor task should be:

Create the Academic Structure Module including migrations, models, relationships, controllers, routes, Bootstrap RTL views, and DataTables CRUD for institutions, colleges, departments, study_levels, academic_systems, study_types, academic_programs, academic_years, academic_stages, and semesters.