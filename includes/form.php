<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Consultation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            overflow-y: auto;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin-top: 20px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-group textarea {
            resize: none;
            height: 80px;
        }

        .form-group .budget-range {
            display: flex;
            gap: 10px;
        }

        .form-group .budget-range input {
            width: 48%;
        }

        .form-group .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .form-group .checkbox-group input {
            width: auto;
            margin-top: 4px;
        }

        .submit-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Company Detail</h2>
        <form>
            <!-- Company Details -->
            <div class="form-group">
                <label for="company-name">Company Name</label>
                <input type="text" id="company-name" name="company-name" placeholder="e.g. SES">
            </div>

            <div class="form-group">
                <label for="company-field">Company Field</label>
                <input type="text" id="company-field" name="company-field" placeholder="e.g. Retail, Architectural, etc.">
            </div>

            <div class="form-group">
                <label for="company-size">Company Size</label>
                <input type="text" id="company-size" name="company-size" placeholder="Number of Employees">
            </div>

            <div class="form-group">
                <label for="company-address">Company Address</label>
                <input type="text" id="company-address" name="company-address" placeholder="City and District of your company">
            </div>

            <!-- Consultation Details -->
            <h2>Consultation Detail</h2>

            <div class="form-group">
                <label for="current-lighting">Current Lighting Setup</label>
                <textarea id="current-lighting" name="current-lighting" placeholder="Type your message here"></textarea>
            </div>

            <div class="form-group">
                <label for="problem-detail">Problem Detail</label>
                <textarea id="problem-detail" name="problem-detail" placeholder="Type your message here"></textarea>
            </div>

            <div class="form-group">
                <label for="goals">Goals</label>
                <textarea id="goals" name="goals" placeholder="Type your message here"></textarea>
            </div>

            <div class="form-group">
                <label>Budget Range</label>
                <div class="budget-range">
                    <input type="number" name="min-budget" placeholder="Min Rp">
                    <input type="number" name="max-budget" placeholder="Max Rp">
                </div>
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="privacy-policy" name="privacy-policy">
                <label for="privacy-policy">I agree to the processing of my personal data in accordance with the privacy policy.</label>
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="updates-promotions" name="updates-promotions">
                <label for="updates-promotions">I agree to receive updates, promotions, and other communications related to your products and services.</label>
            </div>

            <button type="submit" class="submit-btn">Save Form</button>
        </form>
    </div>
</body>
</html>
