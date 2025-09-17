# Project Blueprint

## Overview

This project is a full-stack web application for managing a garment rental business. It allows staff to manage customers, garments, bookings, returns, and payments. The application is built with Laravel and uses a MySQL database.

## Features

*   **Dashboard:** An overview of the business, including key metrics and recent activity.
*   **Customers:** A CRUD interface for managing customer information.
*   **Garments:** A CRUD interface for managing garment information, including images, pricing, and status.
*   **Bookings:** A system for creating and managing garment rental bookings.
*   **Returns:** A system for processing garment returns and updating garment status.
*   **Payments:** A system for recording and tracking payments.
*   **Reports:** A tool for generating reports on various aspects of the business.
*   **Settings:** A page for configuring application settings, such as pricing and tax rates.

## Design

*   **Frontend:** The frontend is built with Blade and Tailwind CSS. The design is clean, modern, and responsive.
*   **Backend:** The backend is built with Laravel. It follows the MVC pattern and uses Eloquent ORM for database interactions.

## Current Task

**Fix Returns Table**

*   **Goal:** Resolve the "Ajax error" in the returns table.
*   **Plan:**
    1.  Install the `yajra/laravel-datatables-oracle` package.
    2.  Correct the table name in `GarmentReturnController.php`.
    3.  Ensure the `GarmentReturn` model uses the correct table name.
    4.  Add null-safe operators to the controller to prevent errors from missing relationships.
