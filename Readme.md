# GitHub Repositories Cloner

This project is designed to clone all public (or private with a token) repositories of a GitHub user to a local folder.

## Features:
- Fetches a list of repositories of a GitHub user.
- Clones all repositories to a specified destination.
- Supports GitHub personal access tokens for increased API rate limits.

## Installation and Usage

1. **Install PHP**:  
   This project requires PHP. First, install PHP from the official [PHP website](https://www.php.net/downloads).

2. **Download the Code**:  
   Download the `RepoCloner.php` file and place it in the folder where you want to run the project.

3. **Configure the Script**:  
   Open the `RepoCloner.php` file and configure the following settings:

    - **GitHub Username**:  
      Add your GitHub username or organization to the `$github_username` variable.
    
    - **GitHub Personal Access Token (Optional)**:  
      To increase the API rate limit and access private repositories, you can add your GitHub personal access token to the `$token` variable. This token is optional.
      
      To generate a GitHub Personal Access Token, go to [GitHub Personal Access Tokens](https://github.com/settings/tokens) and create a new token.

    - **Destination Path**:  
      Specify the destination path where the repositories will be cloned in the `$dir_destination` variable.

    ```php
    $github_username = "github_username";  // Your GitHub username or organization
    $dir_destination = __DIR__ . '/src';  // Path to clone the repositories to
    $token = ""; // GitHub personal access token (optional)
    ```

4. **Run the Script**:  
   To run the project, use the following command in the terminal:

    ```bash
    php RepoCloner.php
    ```

    After running this command, all repositories of the specified user will be cloned to your destination path.

## Code Explanation

1. **`getGitHubRepos` Function**:  
   This function fetches a list of all public or private repositories (using the token) from the GitHub API.

   Parameters:
   - `$github_username`: The GitHub username.
   - `$token`: The GitHub personal access token (optional).

2. **`cloneAllRepos` Function**:  
   This function clones all the repositories received from `getGitHubRepos` to the specified destination folder.

   Parameters:
   - `$github_username`: The GitHub username.
   - `$dir_destination`: The destination path for cloning the repositories.
   - `$token`: The GitHub personal access token (optional).

## Example Usage

To clone the repositories of the user `github_username` into the `sec` folder using a GitHub personal access token, the code would be as follows:

```php
$github_username = "github_username"; // GitHub username
$dir_destination = __DIR__ . '/src'; // Destination path
$token = "your_github_personal_access_token"; // GitHub personal access token
cloneAllRepos($github_username, $dir_destination, $token);
```
This script will clone all the repositories of the specified GitHub user into the src folder.

## Troubleshooting
>HTTP 401 Error: If you receive a 401 Unauthorized error, make sure your GitHub personal access token is set correctly, especially >if you are trying to access private repositories.
>
>HTTP 403 Error: This error is typically caused by exceeding GitHub's rate limits. To avoid this, use a personal access token.



# GitHub Repositories Cloner

این پروژه برای کلون کردن تمام ریپازیتوری‌های عمومی (یا خصوصی در صورت وارد کردن توکن) یک کاربر از GitHub به پوشه محلی طراحی شده است.

## ویژگی‌ها:
- دریافت لیست ریپازیتوری‌های یک کاربر از GitHub
- کلون کردن تمام ریپازیتوری‌ها به مسیر مشخص شده
- پشتیبانی از توکن شخصی GitHub برای افزایش محدودیت نرخ API

## نصب و استفاده

1. این پروژه به PHP نیاز دارد. ابتدا PHP را نصب کنید. شما می‌توانید آن را از [وب‌سایت رسمی PHP](https://www.php.net/downloads) دریافت کنید.

2. فایل کد `RepoCloner.php` را دانلود و در پوشه‌ای که می‌خواهید پروژه را اجرا کنید قرار دهید.

3. در فایل `RepoCloner.php`، تنظیمات اولیه را انجام دهید:

    - **نام کاربری GitHub**:
      نام کاربری یا سازمان GitHub خود را به متغیر `$github_username` اضافه کنید.
    
    - **توکن شخصی GitHub (اختیاری)**:
      برای افزایش محدودیت نرخ API و دسترسی به ریپازیتوری‌های خصوصی، شما می‌توانید توکن شخصی GitHub خود را به متغیر `$token` اضافه کنید. این توکن اختیاری است.
      برای دریافت توکن شخصی GitHub، به [GitHub Personal Access Tokens](https://github.com/settings/tokens) بروید و یک توکن جدید ایجاد کنید.
      
    - **مسیر مقصد**:
      مسیر مقصد برای کلون کردن ریپازیتوری‌ها را در متغیر `$dir_destination` مشخص کنید.

    ```php
    $github_username = "github_username";  // نام کاربری یا سازمان GitHub
    $dir_destination = __DIR__ . '/src';  // مسیر مقصد برای کلون کردن
    $token = ""; // توکن شخصی GitHub (اختیاری)
    ```

4. برای اجرای پروژه از دستور زیر در خط فرمان استفاده کنید:

    ```bash
    php RepoCloner.php
    ```

    پس از اجرای این دستور، تمامی ریپازیتوری‌های کاربر مشخص شده به مسیر مقصد شما کلون خواهند شد.

## توضیح کد

1. **تابع `getGitHubRepos`**:
   - این تابع لیست تمامی ریپازیتوری‌های عمومی یا خصوصی (با استفاده از توکن) کاربر را از API GitHub دریافت می‌کند.
   - پارامترها:
     - `$github_username`: نام کاربری GitHub
     - `$token`: توکن شخصی GitHub (اختیاری)

2. **تابع `cloneAllRepos`**:
   - این تابع برای کلون کردن تمام ریپازیتوری‌های دریافتی از `getGitHubRepos` به پوشه مقصد استفاده می‌شود.
   - پارامترها:
     - `$github_username`: نام کاربری GitHub
     - `$dir_destination`: مسیر مقصد برای کلون کردن ریپازیتوری‌ها
     - `$token`: توکن شخصی GitHub (اختیاری)

## مثال استفاده

برای کلون کردن ریپازیتوری‌های کاربر `github_username` به پوشه `sec`، با استفاده از توکن شخصی GitHub، کد به‌صورت زیر خواهد بود:

```php
$github_username = "github_username"; // نام کاربری GitHub
$dir_destination = __DIR__ . '/src'; // مسیر مقصد
$token = "your_github_personal_access_token"; // توکن شخصی GitHub
cloneAllRepos($github_username, $dir_destination, $token);
```

## خطاها و رفع مشکل

اگر مشکلی در کلون کردن ریپازیتوری‌ها پیش آمد، خروجی خطا در کنسول نمایش داده می‌شود. این خروجی ممکن است شامل خطاهایی مانند محدودیت نرخ API یا عدم دسترسی به ریپازیتوری‌های خصوصی باشد.
برای دسترسی به ریپازیتوری‌های خصوصی، توکن شخصی GitHub خود را وارد کنید.
