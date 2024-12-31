<?php

/**
 * دریافت لیست ریپازیتوری‌های یک کاربر از GitHub
 * 
 * @param mixed $github_username
 * @param mixed|null $token
 * 
 * @return mixed
 */
function getGitHubRepos($github_username ,$token = null) {
    $url = "https://api.github.com/users/$github_username/repos?per_page=100";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP');
    if ($token) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: token $token",
        ]);
    }

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        die("Error fetching repository list: HTTP $httpCode");
    }

    return json_decode($response, true);
}

/**
 * کلون کردن تمام ریپازیتوری‌ها
 * 
 * @param string $github_username
 * @param string $dir_destination
 * @param string|null $token
 * 
 * @return void
 */
function cloneAllRepos($github_username, $dir_destination, $token = null):void
{
    $repos = getGitHubRepos($github_username, $token = null);

    if (!is_dir($dir_destination)) {
        mkdir($dir_destination, 0755, true);
    }

    foreach ($repos as $repo) {
        $repoName = $repo['name'];
        $cloneUrl = $repo['clone_url'];
        $repoPath = $dir_destination . DIRECTORY_SEPARATOR . $repoName;

        echo "Cloning $repoName...\n";

        $command = sprintf('git clone %s %s 2>&1', escapeshellarg($cloneUrl), escapeshellarg($repoPath));
        $output = shell_exec($command);

        if (strpos($output, 'fatal') !== false) {
            echo "Error cloning $repoName: $output\n";
        } else {
            echo "Successfully cloned $repoName to $repoPath\n";
        }
    }
}

$github_username = "github_username"; 
$dir_destination = __DIR__ . '/src';
$token = ""; // Optional: GitHub personal access token for increased rate limit

cloneAllRepos($github_username, $dir_destination, $token);

