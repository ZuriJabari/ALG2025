# African Champions Import Guide

## Overview
This guide explains how to import African Champions from the Excel file into the seat reservations database.

## What It Does
- Imports names and emails from `assets/1x/Email list- Olara.xlsx`
- Marks all imported records with `fellowship = 'Africa Champions Invite'`
- Sets `is_fellow = true` for easy filtering
- Skips duplicates (checks by email)
- Default sector: `Civil Society`

## Usage

### 1. Preview Import (Dry Run)
See what will be imported without making changes:
```bash
php artisan import:african-champions --dry-run
```

### 2. Run Actual Import
Import the African Champions into the database:
```bash
php artisan import:african-champions
```

### 3. Import from Different File
```bash
php artisan import:african-champions "path/to/your/file.xlsx"
```

## Database Fields
Each African Champion will be saved with:
- `full_name` - From NAME column
- `email` - From Email column
- `phone` - null (not in Excel)
- `sector` - 'Civil Society'
- `is_fellow` - true
- `fellowship` - 'Africa Champions Invite'
- `attendance_mode` - null

## Filtering African Champions
To send targeted emails to African Champions, filter by:
```php
SeatReservation::where('fellowship', 'Africa Champions Invite')->get();
```

Or:
```sql
SELECT * FROM seat_reservations WHERE fellowship = 'Africa Champions Invite';
```

## Excel File Structure
Expected columns:
1. No. (ignored)
2. NAME
3. Email

## Notes
- The command automatically skips duplicate emails
- 52 African Champions in the current list
- All records are marked as fellows for easy identification
