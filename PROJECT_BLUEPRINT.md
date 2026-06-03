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

---

# Chapter 3: Student Affairs Analysis

## Purpose

This chapter defines the complete student lifecycle.

The system must manage the student from:

Applicant
↓
Admitted Student
↓
Registered Student
↓
Active Student
↓
Graduate
↓
Alumni

The student record must remain available throughout all academic stages.

---

# Student Lifecycle

The system should support the following student statuses:

Applicant
Admitted
Registered
Active
Postponed
Failed
Transferred
Withdrawn
Dismissed
Graduated
Alumni

The status history must be preserved.

---

# Student Information Architecture

Student information should be divided into independent sections.

1. Personal Information
2. Contact Information
3. Guardian Information
4. Academic Information
5. Admission Information
6. Student Documents
7. Student Status History
8. Alumni Information

---

# 1. Personal Information

Represents the student's identity.

## Students Table

Core Fields:

- id
- student_no
- admission_no

### Arabic Name

- first_name_ar
- second_name_ar
- third_name_ar
- last_name_ar

### English Name

- first_name_en
- second_name_en
- third_name_en
- last_name_en

### Personal Data

- mother_name
- gender
- birth_date
- nationality
- national_id
- passport_no nullable
- marital_status

### Photo

- photo

### General

- notes
- created_at
- updated_at

---

# Student Number Policy

Student numbers must be generated automatically.

Example:

2026-000001
2026-000002
2026-000003

Rules:

- Unique
- Non-editable
- Generated by system

---

# 2. Contact Information

Represents communication information.

## Fields

- phone
- alternative_phone
- email

### Address Structure

- province
- district
- sub_district
- address

### Optional

- postal_code

---

# 3. Guardian Information

Represents student guardian data.

The system must support guardian information because it is required by most universities.

## Table: student_guardians

Fields:

- id
- student_id

- full_name
- relationship

Examples:

Father
Mother
Brother
Sister
Guardian

- phone
- alternative_phone
- address
- occupation

- created_at
- updated_at

## Notes

A student may have more than one guardian.

---

# 4. Academic Information

Represents the student's academic placement.

## Student Academic Assignment

Every student must be linked to:

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

## Rules

No academic names should be stored as text.

Use foreign keys only.

---

# 5. Admission Information

Represents the student's admission data.

## Table: admission_types

Examples:

- Central Admission
- Private Admission
- Direct Admission
- Evening Study
- Parallel Study
- Martyrs Admission
- Postgraduate Admission

Fields:

- id
- code
- name_ar
- name_en
- status

---

## Student Admission Data

Fields:

- admission_type_id

- admission_year

- admission_score

- graduation_school

- graduation_year

- admission_date

---

# 6. Student Status Management

Represents the student's academic status.

## Table: student_statuses

Examples:

Active
Postponed
Failed
Transferred
Dismissed
Graduated
Withdrawn

Fields:

- id
- code
- name_ar
- name_en
- status

---

## Table: student_status_history

Fields:

- id
- student_id
- student_status_id

- start_date
- end_date nullable

- reason

- notes

## Notes

Every status change should be stored.

The system must preserve complete student history.

---

# 7. Student Documents

Represents uploaded documents.

## Table: document_types

Examples:

- Personal Photo
- National ID
- Passport
- High School Certificate
- Residence Card
- Admission Letter

Fields:

- id
- code
- name_ar
- name_en

---

## Table: student_documents

Fields:

- id
- student_id
- document_type_id

- file_path

- issue_date nullable
- expiry_date nullable

- notes

- created_at
- updated_at

## Notes

Do not store documents inside students table.

Use a dedicated document management module.

---

# 8. Special Needs Support

The system should support students with special needs.

## Fields

- has_special_needs
- special_needs_notes

Examples:

- Physical Disability
- Visual Disability
- Hearing Disability

---

# 9. International Students

The system should support international students.

## Fields

- student_category

Values:

- Iraqi
- International

Additional Fields:

- country
- passport_no
- visa_no nullable

---

# 10. Alumni Management

Graduates should remain inside the system.

Student status changes to:

Graduated

The student record must remain available.

Future alumni module can be added without redesigning students table.

---

# Relationships

Student belongs to:

- Institution
- College
- Department
- Academic Program
- Study Level
- Academic System
- Study Type
- Academic Year
- Academic Stage

Student has many:

- Documents
- Status History
- Registrations
- Grades
- Attendance Records

Student may have many:

- Guardians

---

# Design Rules

Rule 1

Student names should be stored in separate fields.

Rule 2

Student number must be generated automatically.

Rule 3

Academic structure must use foreign keys.

Rule 4

Status changes must be logged.

Rule 5

Documents must be stored in dedicated tables.

Rule 6

Graduates must remain in the system.

Rule 7

The design must support postgraduate students.

Rule 8

The design must support international students.

Rule 9

The design must support special needs students.

---

# Implementation Priority

1. admission_types
2. student_statuses
3. document_types
4. students
5. student_guardians
6. student_documents
7. student_status_history

After completing these modules:

Student Management Module will be considered complete.

---
# Chapter 4: Training Management Analysis

## Purpose

The system should not be limited to academic education.

It should support:

* Universities
* Colleges
* Institutes
* Training Centers

The training module must operate independently or alongside academic modules.

---

# Training Vision

The system must support:

* Academic Education
* Professional Training
* Continuous Education
* Graduate Development Programs

Examples:

* Laravel Course
* Project Management Course
* Accounting Course
* AI Workshop
* Leadership Program
* Graduate Training Program

---

# Training Structure

The hierarchy should be:

Training Category
↓
Training Program
↓
Training Batch
↓
Trainer
↓
Participant
↓
Certificate

---

# 1. Training Categories

Groups of training programs.

Examples:

* Information Technology
* Management
* Accounting
* Languages
* Engineering
* Medical

## Table: training_categories

Fields:

* id
* code
* name_ar
* name_en
* description
* status
* created_at
* updated_at

---

# 2. Training Programs

Represents a course or training program.

Examples:

* Laravel Development
* Accounting Fundamentals
* Leadership Skills
* Computer Networks

## Table: training_programs

Fields:

* id
* training_category_id
* code
* name_ar
* name_en
* description
* duration_hours
* delivery_method
* program_type
* certificate_available
* status
* created_at
* updated_at

---

# Program Types

Examples:

* Course
* Workshop
* Seminar
* Conference
* Event

---

# Delivery Methods

Examples:

* Classroom
* Online
* Hybrid

---

# 3. Training Batches

The same program may run multiple times.

Example:

Laravel Course

* Batch 1
* Batch 2
* Batch 3

## Table: training_batches

Fields:

* id
* training_program_id
* batch_code
* start_date
* end_date
* capacity
* registration_deadline
* status
* created_at
* updated_at

---

# 4. Trainers

Represents course instructors.

A trainer may be:

* University Teacher
* External Expert
* Company Consultant

## Table: trainers

Fields:

* id
* trainer_no
* full_name
* specialization
* phone
* email
* photo
* bio
* trainer_type
* status
* created_at
* updated_at

---

# Trainer Types

Examples:

* Internal
* External
* Guest

---

# 5. Participants

A participant may be:

* Student
* Teacher
* Employee
* Graduate
* External Person

## Table: participant_types

Fields:

* id
* code
* name_ar
* name_en
* status

---

# 6. Training Registrations

Represents enrollment in a batch.

## Table: training_registrations

Fields:

* id

* training_batch_id

* participant_type_id

* student_id nullable

* trainer_id nullable

* external_name nullable

* registration_date

* status

* created_at

* updated_at

---

# Registration Statuses

Examples:

* Registered
* Approved
* Rejected
* Completed
* Cancelled

---

# 7. Training Sessions

Represents training meetings.

## Table: training_sessions

Fields:

* id
* training_batch_id
* trainer_id
* session_date
* topic
* duration_hours
* notes

---

# 8. Training Attendance

## Table: training_attendance

Fields:

* id
* training_session_id
* registration_id
* status
* notes

---

# Attendance Statuses

Examples:

* Present
* Absent
* Late
* Excused

---

# 9. Assessments

Optional evaluations.

## Table: training_assessments

Fields:

* id
* training_batch_id
* title
* max_score
* assessment_date

---

## Table: training_results

Fields:

* id
* assessment_id
* registration_id
* score
* result
* notes

---

# 10. Certificates

One of the most important modules.

## Table: certificates

Fields:

* id
* certificate_no
* registration_id
* issue_date
* verification_code
* certificate_file
* status
* created_at
* updated_at

---

# Certificate Verification

The system must support:

* QR Code Verification

Future versions may include:

* Online Verification Portal

---

# 11. Graduate Development Programs

The system should support:

* Alumni Training
* Graduate Development
* Employment Preparation

This allows institutions to continue serving graduates after graduation.

---

# Integration With Academic System

Students should not be duplicated.

A student can:

* Study academic subjects
* Attend training programs
* Receive training certificates

Within the same profile.

---

# Dashboards

Training Dashboard should display:

* Programs
* Batches
* Participants
* Certificates
* Attendance
* Completion Rates

---

# Design Rules

Rule 1

Training programs must be independent from academic subjects.

Rule 2

Students should not be duplicated.

Rule 3

Certificates must be traceable.

Rule 4

Attendance must be session-based.

Rule 5

Programs may be repeated through batches.

Rule 6

The module must support external participants.

Rule 7

Graduates must be allowed to join training programs.

---

# Implementation Priority

1. training_categories
2. training_programs
3. trainers
4. participant_types
5. training_batches
6. training_registrations
7. training_sessions
8. training_attendance
9. training_assessments
10. training_results
11. certificates

---

# Business Value

This module transforms the project from:

University ERP

into:

Academic & Training Management Platform

which significantly increases its market value and usability across universities, institutes, and training centers.

# Chapter 5: Teaching & Curriculum Analysis

## Purpose

This chapter defines the academic teaching structure, curriculum management, study plans, subjects, and teaching assignments.

The design must support:

* Undergraduate Programs
* Postgraduate Programs
* Annual System
* Semester System
* Course-Based System

Without requiring database redesign in future versions.

---

# Academic Teaching Structure

The academic structure should follow:

Academic Program
↓
Study Plan
↓
Subjects
↓
Teaching Assignments
↓
Students

---

# 1. Academic Titles

Represents academic ranks.

Examples:

* Assistant Lecturer
* Lecturer
* Assistant Professor
* Professor

## Table: academic_titles

Fields:

* id
* code
* name_ar
* name_en
* rank_order
* status
* created_at
* updated_at

---

# 2. Teachers

Represents teaching staff.

## Table: teachers

Fields:

* id

* employee_no

* academic_title_id

* department_id

* full_name_ar

* full_name_en

* specialization

* phone

* email

* photo

* hire_date

* status

* created_at

* updated_at

---

# Relationships

Teacher belongs to:

* Academic Title
* Department

Teacher has many:

* Teaching Assignments

---

# 3. Subject Categories

Represents subject classification.

Examples:

* Core
* Elective
* Practical
* General
* Training

## Table: subject_categories

Fields:

* id
* code
* name_ar
* name_en
* description
* status
* created_at
* updated_at

---

# 4. Subjects

Represents academic subjects.

## Architectural Decision

Subjects should belong to:

Academic Program

and not directly to Department.

This provides flexibility for:

* Bachelor Programs
* Master Programs
* PhD Programs

within the same department.

---

## Table: subjects

Fields:

* id

* academic_program_id

* subject_category_id

* code

* name_ar

* name_en

* description

* credit_hours

* theoretical_hours

* practical_hours

* ects_points nullable

* status

* created_at

* updated_at

---

# 5. Subject Prerequisites

Represents prerequisite subjects.

Examples:

Database II

requires

Database I

---

## Table: subject_prerequisites

Fields:

* id

* subject_id

* prerequisite_subject_id

---

# Rules

A subject may have multiple prerequisites.

Prerequisites must be validated during registration.

---

# 6. Study Plans

Represents official curriculum plans.

Examples:

Study Plan 2025

Study Plan 2026

---

## Table: study_plans

Fields:

* id

* academic_program_id

* academic_year_id

* version

* status

* created_at

* updated_at

---

# Purpose

Allows curriculum updates without affecting historical student records.

---

# 7. Study Plan Subjects

Represents subject placement within study plans.

## Table: study_plan_subjects

Fields:

* id

* study_plan_id

* subject_id

* academic_stage_id

* semester_id nullable

* is_required

* display_order

---

# Examples

Programming I

* Stage 1
* Semester 1
* Required

AI Fundamentals

* Stage 4
* Semester 2
* Elective

---

# 8. Teaching Assignments

Represents teaching allocations.

Teachers should not be linked directly to subjects.

Assignments should be managed through a dedicated table.

---

## Table: teaching_assignments

Fields:

* id

* teacher_id

* subject_id

* academic_year_id

* semester_id nullable

* academic_stage_id

* assignment_type

* status

---

# Assignment Types

Examples:

* Theory
* Practical
* Lab
* Seminar
* Project

---

# 9. Subject Groups

Represents class groups.

Examples:

* A
* B
* C
* D

---

## Table: subject_groups

Fields:

* id

* subject_id

* academic_year_id

* semester_id nullable

* group_name

* capacity

* status

---

# Purpose

Supports large student populations and multiple groups per subject.

---

# 10. Teaching Loads

Represents instructor workload.

## Table: teaching_loads

Fields:

* id

* teacher_id

* academic_year_id

* semester_id nullable

* total_hours

* notes

---

# Purpose

Supports workload tracking and administrative reporting.

---

# Academic Rules

## Rule 1

Subjects belong to Academic Programs.

Not directly to Departments.

---

## Rule 2

Study Plans must be independent.

Curriculum changes must not affect historical records.

---

## Rule 3

Prerequisites are mandatory.

The registration system must validate them automatically.

---

## Rule 4

Teachers are linked to Subjects through Teaching Assignments.

Never directly.

---

## Rule 5

The design must support:

* Annual System
* Semester System
* Course-Based System

using the same database structure.

---

## Rule 6

Required and Elective subjects must be supported.

---

## Rule 7

The same subject may appear in multiple study plans.

---

# Relationships Summary

Academic Program

* hasMany Subjects
* hasMany Study Plans

Study Plan

* hasMany Study Plan Subjects

Subject

* belongsTo Academic Program
* belongsTo Subject Category
* hasMany Prerequisites
* hasMany Teaching Assignments
* hasMany Subject Groups

Teacher

* belongsTo Academic Title
* belongsTo Department
* hasMany Teaching Assignments
* hasMany Teaching Loads

---

# Implementation Priority

1. academic_titles

2. teachers

3. subject_categories

4. subjects

5. subject_prerequisites

6. study_plans

7. study_plan_subjects

8. teaching_assignments

9. subject_groups

10. teaching_loads

---

# Business Value

This chapter enables the system to support:

* Public Universities
* Private Universities
* Institutes
* Undergraduate Programs
* Postgraduate Programs
* Annual Education
* Semester Education
* Course-Based Education

without future redesign.

---

# Completion Criteria

This module is considered complete when:

* Academic Titles are managed.
* Teachers are managed.
* Subjects are managed.
* Study Plans are managed.
* Prerequisites are managed.
* Teaching Assignments are managed.
* Subject Groups are managed.
* Teaching Loads are managed.

After completing this chapter, the system will be ready for:

Chapter 6: Registration, Grades & Attendance Analysis

# Chapter 6: Registration, Grades & Attendance Analysis

## Purpose

This chapter defines:

* Student Registration
* Subject Registration
* Academic Enrollment
* Attendance Management
* Assessment Structure
* Grades Management
* GPA Calculation
* Academic Progression
* Graduation Requirements

The design must support:

* Annual System
* Semester System
* Course-Based System
* Postgraduate Programs

without requiring future redesign.

---

# Academic Registration Structure

The academic registration process should follow:

Academic Year
↓
Student Enrollment
↓
Subject Registration
↓
Attendance
↓
Assessments
↓
Grades
↓
Academic Results
↓
Graduation

---

# 1. Student Enrollment

Represents student activation for an academic year.

## Table: student_enrollments

Fields:

* id
* student_id
* academic_year_id
* academic_program_id
* academic_stage_id
* enrollment_date
* status
* notes
* created_at
* updated_at

---

# Enrollment Statuses

Examples:

* Active
* Postponed
* Suspended
* Graduated
* Withdrawn

---

# Purpose

Allows tracking student progression across academic years.

---

# 2. Subject Registration

Represents student registration in subjects.

## Table: subject_registrations

Fields:

* id
* student_enrollment_id
* subject_id
* semester_id nullable
* registration_date
* status
* created_at
* updated_at

---

# Registration Statuses

Examples:

* Registered
* Dropped
* Completed
* Failed
* Repeated

---

# Rules

Students may register only eligible subjects.

Prerequisites must be validated automatically.

---

# 3. Assessment Types

Represents evaluation components.

## Table: assessment_types

Fields:

* id
* code
* name_ar
* name_en
* description
* status
* created_at
* updated_at

---

# Examples

* Year Work
* Midterm
* Practical
* Final Exam
* Oral Exam
* Seminar
* Project
* Research
* Thesis

---

# Purpose

Allows flexible grading structures.

---

# 4. Subject Assessment Structure

Defines how a subject is evaluated.

## Table: subject_assessments

Fields:

* id
* subject_id
* assessment_type_id
* max_score
* weight_percentage
* created_at
* updated_at

---

# Examples

Programming

* Practical 20%
* Midterm 20%
* Final 60%

Graduation Project

* Project 70%
* Defense 30%

---

# Rules

Total weight percentage must equal 100%.

---

# 5. Student Assessment Scores

Represents actual student scores.

## Table: student_assessment_scores

Fields:

* id
* subject_registration_id
* subject_assessment_id
* score
* notes
* created_at
* updated_at

---

# Purpose

Stores detailed grading records.

---

# 6. Final Grades

Represents calculated final results.

## Table: final_grades

Fields:

* id
* subject_registration_id
* total_score
* letter_grade
* grade_points
* result
* remarks
* created_at
* updated_at

---

# Result Types

Examples:

* Pass
* Fail
* Incomplete
* Deferred

---

# Grade Letters

Examples:

* A
* B
* C
* D
* F

---

# Purpose

Stores official final results.

---

# 7. GPA System

Supports cumulative GPA calculations.

## Table: student_gpa_records

Fields:

* id
* student_id
* academic_year_id
* semester_id nullable
* earned_credit_hours
* total_grade_points
* gpa
* cgpa
* created_at
* updated_at

---

# Purpose

Tracks academic performance throughout study years.

---

# 8. Attendance Sessions

Represents teaching sessions.

## Table: attendance_sessions

Fields:

* id
* subject_id
* teacher_id
* academic_year_id
* semester_id nullable
* session_date
* topic
* notes
* created_at
* updated_at

---

# Purpose

Attendance should be recorded by session.

Not by subject totals.

---

# 9. Attendance Records

Represents student attendance.

## Table: attendance_records

Fields:

* id
* attendance_session_id
* student_id
* status
* notes
* created_at
* updated_at

---

# Attendance Statuses

Examples:

* Present
* Absent
* Late
* Excused

---

# Rules

Attendance percentages must be calculated automatically.

---

# 10. Academic Progression

Represents movement between stages.

## Table: academic_progressions

Fields:

* id
* student_id
* academic_year_id
* from_stage_id
* to_stage_id
* decision
* decision_date
* notes
* created_at
* updated_at

---

# Decision Types

Examples:

* Promoted
* Failed
* Repeated
* Graduated

---

# Purpose

Tracks academic advancement history.

---

# 11. Graduation Requirements

Represents completion requirements.

## Rules

Students may graduate only when:

* All required subjects are completed.
* Required credit hours are achieved.
* GPA requirements are met.
* Financial obligations are cleared.

---

# Graduation Status

Stored through:

student_statuses

with status:

Graduated

---

# Relationships Summary

Student

* hasMany Enrollments
* hasMany GPA Records
* hasMany Attendance Records

Student Enrollment

* hasMany Subject Registrations

Subject Registration

* hasMany Assessment Scores
* hasOne Final Grade

Subject

* hasMany Subject Assessments
* hasMany Attendance Sessions

Assessment Type

* hasMany Subject Assessments

Attendance Session

* hasMany Attendance Records

---

# Design Rules

Rule 1

Registration must be separated from Student Profile.

---

Rule 2

Attendance must be session-based.

---

Rule 3

Assessment structure must be configurable.

---

Rule 4

Grades must support annual and semester systems.

---

Rule 5

GPA must be calculated automatically.

---

Rule 6

Prerequisites must be validated during registration.

---

Rule 7

Graduation requirements must be configurable.

---

# Implementation Priority

1. student_enrollments

2. subject_registrations

3. assessment_types

4. subject_assessments

5. student_assessment_scores

6. final_grades

7. student_gpa_records

8. attendance_sessions

9. attendance_records

10. academic_progressions

---

# Business Value

This chapter enables:

* Academic Registration
* Flexible Grading
* Attendance Tracking
* GPA Calculation
* Promotion Decisions
* Graduation Management

for universities, institutes, and postgraduate programs using a unified architecture.

---

# Completion Criteria

This module is considered complete when:

* Student Enrollment is operational.
* Subject Registration is operational.
* Attendance is operational.
* Assessments are operational.
* GPA calculations are operational.
* Academic Progression is operational.
* Graduation decisions are operational.

After completing this chapter, the system will be ready for:

Chapter 7: Security, Permissions & Reporting Analysis


# Chapter 7: Security, Permissions & Reporting Analysis

## Purpose

This chapter defines:

* Authentication
* Authorization
* Roles
* Permissions
* Dashboards
* Notifications
* Audit Logs
* Reports

The system must ensure security, accountability, and controlled access to all modules.

---

# Security Architecture

The system should implement:

Authentication
↓
Roles
↓
Permissions
↓
Audit Logs
↓
Reports

---

# 1. Authentication

Represents user login and identity verification.

## Requirements

* Secure Login
* Password Reset
* Email Verification Optional
* Session Management
* Account Locking after repeated failures

---

# Authentication Fields

Users table should support:

* username
* email
* password
* last_login_at
* last_login_ip
* status

---

# User Statuses

Examples:

* Active
* Inactive
* Suspended
* Locked

---

# 2. Roles Management

Represents user responsibilities.

## Table: roles

Recommended Package:

spatie/laravel-permission

---

# Core Roles

Examples:

* Super Admin
* Institution Admin
* Registrar
* Academic Affairs
* Department Head
* Teacher
* Finance Officer
* Training Manager
* Trainer
* Student

---

# Role Responsibilities

## Super Admin

Full system access.

---

## Institution Admin

Institution management.

---

## Registrar

Student registration and admissions.

---

## Academic Affairs

Academic records and progression.

---

## Department Head

Department supervision.

---

## Teacher

Subjects, attendance, grades.

---

## Finance Officer

Fees and payments.

---

## Training Manager

Training programs management.

---

## Trainer

Training delivery and attendance.

---

## Student

Self-service access.

---

# 3. Permissions Management

Represents actions allowed within the system.

## Table: permissions

Examples:

* View
* Create
* Edit
* Delete
* Print
* Export
* Approve
* Publish
* Assign
* Manage

---

# Permission Strategy

Permissions should be assigned through roles.

Users should not receive direct permissions unless necessary.

---

# 4. Dashboard Management

Each role should have a dedicated dashboard.

---

# Admin Dashboard

Displays:

* Total Students
* Total Teachers
* Total Programs
* Financial Summary
* Notifications

---

# Academic Dashboard

Displays:

* Registrations
* Results
* Attendance
* Academic Progress

---

# Teacher Dashboard

Displays:

* Assigned Subjects
* Attendance Sessions
* Pending Grades
* Announcements

---

# Student Dashboard

Displays:

* Academic Profile
* Registered Subjects
* Grades
* Attendance
* Financial Status
* Certificates

---

# Training Dashboard

Displays:

* Programs
* Batches
* Participants
* Certificates

---

# Finance Dashboard

Displays:

* Fees
* Payments
* Outstanding Balances

---

# 5. Notification System

Represents system alerts.

## Table: notifications

Fields:

* id
* user_id
* title
* message
* type
* is_read
* created_at

---

# Notification Types

Examples:

* Academic
* Financial
* Training
* Administrative

---

# Delivery Channels

* In-System
* Email
* SMS Future Version

---

# 6. Audit Logs

Represents activity tracking.

One of the most important modules.

---

## Table: audit_logs

Fields:

* id
* user_id
* action
* module
* record_id
* old_values
* new_values
* ip_address
* user_agent
* created_at

---

# Examples

* Student Updated
* Grade Modified
* Payment Recorded
* Subject Deleted

---

# Purpose

Provides accountability and traceability.

---

# 7. Reports Architecture

Reports should be generated from all modules.

---

# Student Reports

Examples:

* Student List
* Student Profile
* Admission Reports
* Alumni Reports

---

# Academic Reports

Examples:

* Subjects by Program
* Teacher Workload
* Study Plans
* Registration Reports

---

# Grades Reports

Examples:

* Grade Sheets
* GPA Reports
* Top Students
* Failed Students

---

# Attendance Reports

Examples:

* Attendance Percentage
* Absence Reports
* Attendance Violations

---

# Financial Reports

Examples:

* Fee Statements
* Payment Reports
* Outstanding Balances

---

# Training Reports

Examples:

* Programs
* Participants
* Attendance
* Certificates

---

# Graduation Reports

Examples:

* Graduation Lists
* Degree Verification
* Alumni Statistics

---

# 8. Export & Printing

All major reports should support:

* PDF
* Excel
* Print

---

# 9. Data Protection Rules

Rule 1

Users may access only authorized modules.

---

Rule 2

All critical operations must be logged.

---

Rule 3

Grades must be protected from unauthorized modifications.

---

Rule 4

Financial records must be auditable.

---

Rule 5

Passwords must be encrypted.

---

Rule 6

Sensitive data must never be exposed through URLs.

---

# Relationships Summary

User

* hasMany Notifications
* hasMany Audit Logs

Role

* hasMany Permissions

Permission

* belongsToMany Roles

---

# Recommended Packages

* spatie/laravel-permission
* laravel/auditing (optional)
* Laravel Notifications

---

# Implementation Priority

1. Authentication

2. Roles

3. Permissions

4. Dashboards

5. Notifications

6. Audit Logs

7. Reports

8. Export & Printing

---

# Business Value

This chapter provides:

* Security
* Accountability
* Controlled Access
* Reporting
* Compliance

which are essential for a professional Academic & Training Management Platform.

---

# Completion Criteria

This module is considered complete when:

* Authentication is operational.
* Roles are operational.
* Permissions are operational.
* Dashboards are operational.
* Notifications are operational.
* Audit Logs are operational.
* Reports are operational.

After completing this chapter, the system will be ready for:

Chapter 8: Technical Architecture & Implementation Strategy

# Chapter 8: Technical Architecture & Implementation Strategy

## Purpose

This chapter defines the technical architecture, development standards, implementation workflow, deployment strategy, and AI-assisted development approach.

The goal is to ensure consistency, scalability, maintainability, and rapid development.

---

# System Architecture

## Architecture Style

The system shall use:

Layered Architecture

Structure:

Presentation Layer
↓
Controllers
↓
Services
↓
Models
↓
Database

---

# Technology Stack

## Backend

* Laravel 12

## Database

* MySQL 8+

## Frontend

* Bootstrap 5 RTL
* JavaScript
* jQuery

## Data Grids

* DataTables

## Authentication

* Laravel Authentication

## Permissions

* spatie/laravel-permission

## Version Control

* Git
* GitHub

## AI Development

* Cursor
* GitHub Copilot

---

# Project Structure

## Application Layers

app/

* Models
* Http/Controllers
* Services
* Policies
* Traits

---

## Views

resources/views/

Organized by modules:

* institutions
* colleges
* departments
* students
* teachers
* subjects
* training
* finance
* reports

---

## Routes

routes/

* web.php
* api.php

Future:

* admin.php
* student.php
* teacher.php

---

# Database Standards

## Primary Keys

Use:

id

Auto Increment Big Integer

---

## Foreign Keys

Use:

institution_id
college_id
department_id

etc.

---

## Status Fields

Every major table should include:

status

Examples:

* Active
* Inactive

---

## Timestamps

Every major table should include:

* created_at
* updated_at

---

# Coding Standards

## Naming Convention

Tables:

snake_case plural

Examples:

* students
* colleges
* study_plans

---

Models:

Singular PascalCase

Examples:

* Student
* College
* StudyPlan

---

Controllers:

Resource Controllers

Examples:

* StudentController
* CollegeController

---

# Validation Standards

Validation must always be performed in controllers or Form Requests.

Examples:

* required
* unique
* exists
* numeric
* date

---

# UI Standards

## Direction

RTL

Primary language:

Arabic

Secondary language:

English

---

## Design Framework

Bootstrap 5

---

## Tables

All major modules should use:

DataTables

Features:

* Search
* Sort
* Pagination
* Export
* Responsive Layout

---

## Forms

Requirements:

* Validation Errors
* Success Messages
* Bootstrap Styling

---

# File Management

## Upload Location

storage/app/public

---

## Public Access

Use:

php artisan storage:link

---

## Supported Files

* Images
* PDF
* Documents

---

# Security Standards

## Passwords

Must use Laravel hashing.

---

## Authorization

Use:

spatie/laravel-permission

---

## Audit Logging

All sensitive operations should be logged.

Examples:

* Grade Changes
* Student Status Changes
* Financial Transactions

---

# Development Workflow

Each module should follow:

1. Migration
2. Model
3. Relationships
4. Controller
5. Validation
6. Routes
7. Views
8. DataTables
9. Testing
10. Git Commit

---

# Git Strategy

## Branches

Main Branch:

main

Future:

develop

feature/*

---

## Commit Style

Examples:

Add colleges module

Add departments module

Add students module

Fix registration validation

---

# Backup Strategy

## Database

Daily Backup

Future:

Automated Backup

---

## Files

Weekly Backup

Storage Backup

---

# Deployment Strategy

## Development

Laragon

Local MySQL

---

## Production

Linux Server

Nginx

MySQL

SSL Enabled

---

# Cursor Development Rules

Cursor should:

* Read PROJECT_BLUEPRINT.md before coding.
* Implement one module at a time.
* Never generate the entire system at once.
* Follow Laravel best practices.
* Use Bootstrap RTL.
* Use DataTables.
* Create resource controllers.
* Use proper relationships.
* Respect foreign keys.

---

# Module Implementation Order

Phase 1

Academic Structure

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

---

Phase 2

Student Affairs

1. admission_types
2. student_statuses
3. document_types
4. students
5. student_guardians
6. student_documents
7. student_status_history

---

Phase 3

Teaching & Curriculum

1. academic_titles
2. teachers
3. subject_categories
4. subjects
5. subject_prerequisites
6. study_plans
7. study_plan_subjects
8. teaching_assignments

---

Phase 4

Registration & Grades

1. student_enrollments
2. subject_registrations
3. assessment_types
4. subject_assessments
5. student_assessment_scores
6. final_grades
7. attendance

---

Phase 5

Training Management

1. training_categories
2. training_programs
3. trainers
4. training_batches
5. certificates

---

Phase 6

Security & Reporting

1. roles
2. permissions
3. dashboards
4. notifications
5. audit_logs
6. reports

---

# Completion Definition

The system is considered production-ready when:

* All modules are implemented.
* Relationships are tested.
* Permissions are enforced.
* Reports are operational.
* Backup procedures are documented.
* GitHub repository is up to date.
* PROJECT_BLUEPRINT.md matches implementation.

---

# Final Vision

The project shall become:

Academic & Training Management Platform

supporting:

* Universities
* Colleges
* Institutes
* Training Centers

with a scalable architecture suitable for future expansion across Iraq.
