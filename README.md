# Cyber Bullying Management

Cyber Bullying Management is a web application for managing cyber-bullying reports, cases, or moderation workflows.

## Features

- Report submission and case management workflow
- Administrative review and tracking screens
- Database-backed records for incidents and statuses
- Potential user/role separation for reporters and admins
- Space for analytics, moderation, and follow-up actions

## Modules

- Report module: incident submission, details, and attachments when enabled
- Case management module: review status, assignment, and resolution notes
- User module: authentication, profiles, and roles
- Admin module: dashboards, filters, and operational actions
- Notification/reporting module: alerts, summaries, and exports when implemented

## System Architecture

The system should use a layered web-application architecture. The UI collects reports and displays administrative case views. Controllers validate requests and coordinate workflows. Models persist reports, users, status history, and supporting metadata. Service classes can handle notifications, moderation rules, and reporting logic.

## Getting Started

```bash
git clone https://github.com/NahinAhmed28/cyber-bullying-management.git
cd cyber-bullying-management
composer install
npm install
npm run dev
```
