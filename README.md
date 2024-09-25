
# Sustainable Home Construction Material Optimizer

This project is a **Sustainable Home Construction Material Optimizer** that allows users to compare the cost and environmental impact of various materials for construction projects. All materials are measured and priced **per square foot** for consistency.

## Features

- **User Input**: Users can input their **budget**, **area to cover (in square feet)**, and a maximum allowed **environmental impact score**.
- **Material Selection**: Users can select multiple materials from a predefined list, and the system will calculate the total cost and environmental impact of each material for the given area.
- **Results Filtering**: Only materials that fall within the user's budget and environmental impact threshold will be displayed.

## Installation

1. **Clone the repository**:
   ```bash
   git clone git@github.com:akmnahid/Sustainable-Home-Construction-Material-Optimizer.git
   ```

2. **Install dependencies using Composer**:
   ```bash
   composer install
   ```

3. **Run the application**:
   - For a local development server:
     ```bash
     php -S localhost:8000
     ```

4. **Open the application** in your browser:
   ```
   http://localhost:8000/index.php
   ```

### Install via Composer

To include this package in your project, run the following command:

```bash
composer require akmnahid/sustainable-home-construction-material-optimizer
```

## How to Use

1. **Input your budget**: Enter the maximum amount you are willing to spend on materials for your construction project.

2. **Input the area to cover**: Enter the total area you need to cover in **square feet**.

3. **Input the maximum environmental impact score**: Choose the maximum environmental impact score you are willing to accept for the materials (e.g., 40).

4. **Select materials**: Choose from the available materials, and the system will calculate the cost of covering the area with each selected material.

5. **Submit**: Click the **Optimize** button to see a list of materials that meet your criteria. The results will display the total cost and environmental impact for each material.

## Example

Imagine you need to cover **500 square feet** with a budget of **$1000** and an environmental impact threshold of **40**.

- You select **Bamboo** and **Recycled Steel** as your materials.
- The system calculates the total cost for each material and displays only the materials that fit your budget and environmental impact score.

### Sample Form:
- **Budget**: `$1000`
- **Area to Cover**: `500 sq ft`
- **Max Environmental Impact Score**: `40`
- **Selected Materials**: `Bamboo`, `Recycled Steel`

### Sample Output:
```
Material: Bamboo - Cost: $20/sq ft, Environmental Impact: 30, Available in: Asia
Total Cost: $500.00

Material: Recycled Steel - Cost: $50/sq ft, Environmental Impact: 40, Available in: Global
Total Cost: $1000.00
```

## File Structure

```
/sustainable-home-construction
├── composer.json          # Composer configuration
├── index.php              # Main entry point for the application
├── src/
│   ├── DataProvider.php   # Interface for providing materials data
│   ├── Material.php       # Material class representing the construction materials
│   ├── MaterialOptimizer.php  # Logic for optimizing materials based on input
│   └── MaterialsData.php  # Implementation of DataProvider, providing materials measured in square feet
├── vendor/                # Composer-generated folder for dependencies
└── public/                # Static assets (e.g., CSS, JS)
```

## Customization

- **Adding new materials**: To add new materials, update the `MaterialsData.php` file and include the material name, cost, environmental impact score, and unit.
- **Adjusting unit measurement**: This project assumes that all materials are measured in **square feet**. If you want to add other units (e.g., cubic meters), you can modify the `Material` class and the logic for unit conversions.

## License

This project is licensed under the MIT License.
