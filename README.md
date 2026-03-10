# Job Search & Listing Platform

A PHP-based job listing platform where employers can post vacancies and applicants can search and filter them. All job data is stored in a flat tab-delimited text file — no database required.

---

## Features

- **Post a Job** — Employers fill out a form to post a vacancy with a position ID, title, description, closing date, position type, contract type, location, and accepted application methods
- **Server-Side Validation** — Every field is validated on submission including position ID format (`ID` followed by exactly 3 digits via regex), title length (max 10 chars), description length (max 250 chars), and closing date format (`dd/mm/yy`)
- **Unique Position ID enforcement** — Before saving, the file is scanned to ensure no duplicate position IDs exist
- **Search & Filter** — Applicants can filter listings across five fields simultaneously: job title (partial, case-insensitive), position type, contract type, location, and application method
- **Multi-select filtering** — Application method filter supports selecting both Post and Email simultaneously using `array_intersect` against stored multi-value fields
- **Flat file storage** — Jobs are appended as tab-delimited records to `positions.txt`, auto-creating the directory if it doesn't exist

---

## Pages

| File | Description |
|---|---|
| `index.php` | Home page |
| `postjobform.php` | Employer job posting form |
| `postjobprocess.php` | Validates and saves the job posting |
| `searchjobform.php` | Applicant job search form |
| `searchjobprocess.php` | Filters and displays matching jobs |
| `about.php` | About page |
| `taskbar.php` | Shared navigation bar included across all pages |
| `style.css` | Site-wide styles |

---

## Job Record Format

Jobs are stored as tab-delimited lines in `positions.txt`:

```
positionID  title  description  closingDate  positionType  contractType  location  applicationTypes
```

Example:
```
ID001	Developer	Build web apps	01/12/25	Full Time	On-going	Remote	Email, Post
```

---

## Validation Rules

| Field | Rule |
|---|---|
| Position ID | Must match `ID` followed by exactly 3 digits (e.g. `ID001`) |
| Title | Required, max 10 characters |
| Description | Required, max 250 characters |
| Closing Date | Required, must match `dd/mm/yy` format |
| Position Type | Required (Full Time / Part Time) |
| Contract Type | Required (On-going / Fixed term) |
| Location | Required (On site / Remote) |
| Application Type | At least one required (Post / Email) |

---

## Search Filter Behaviour

| Filter | Behaviour |
|---|---|
| Title | Case-insensitive partial match via `stripos` |
| Position Type | Exact match |
| Contract Type | Exact match |
| Location | Exact match |
| Application Type | Multi-select, matches if any selected value intersects stored types via `array_intersect` |

If no filters are selected, all jobs are displayed.

---

## Setup

### Requirements
- PHP 7.4+
- A local server (XAMPP, WAMP, or similar)

### Running Locally

1. Clone or extract the project into your server's web root (e.g. `htdocs/` for XAMPP)
2. Start Apache via XAMPP or equivalent
3. Visit `http://localhost/Job-Search-Website-main/index.php`
4. The `positions.txt` file will be auto-created at `../../data/jobs/positions.txt` on first job submission

---

## Notes

- No database is used — all data is stored in a flat `.txt` file
- No authentication — the platform is open access for both employers and applicants
- The `positions.txt` path is relative (`../../data/jobs/`) and may need adjusting depending on your server setup

---

## Author

**Dimitrios Moros** — Swinburne University of Technology  
Student ID: 103598757
