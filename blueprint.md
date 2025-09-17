# Project Overview

This project is a full-stack web application for managing a garment rental business. It is built with Laravel and is designed to be developed within the Firebase Studio (formerly Project IDX) environment. The application allows the business to manage its customers, garment inventory, bookings, payments, and returns.

# Project Outline

## Features

*   **Customer Management:** Create, read, update, and delete customer records.
*   **Customer Measurements:** Store customer measurements, including neck, chest, sleeve, waist, inseam, and shoe size.
*   **Garment Inventory:** Manage the garment inventory, including adding new garments, updating existing ones, and deleting garments. Each garment has a name, brand, color, fit, type, price, security deposit, damage waiver fee, images, and notes.
*   **Bookings:** Create, read, update, and delete bookings. Each booking is associated with a customer and a garment and has a pickup date, return date, and total cost.
*   **Payments:** Record payments for bookings.
*   **Returns:** Record returns for bookings, including the condition of the returned garment.
*   **Garment Status:** The status of each garment is tracked throughout the rental process. The available statuses are:
    *   Available
    *   Rented out
    *   Awaiting cleaning
    *   Requires repair
*   **Reports:** View high-level reports on the business, including total bookings, total customers, total garments, and the number of rented garments.
*   **Settings:**
    *   **Pricing & Tax Rules:** A section to manage pricing and tax rules.

## Design

The application uses a clean and modern design, with a focus on usability. The layout is responsive and works well on both desktop and mobile devices. The color scheme is based on the default Tailwind CSS color palette, with a few customizations to match the brand's identity.
