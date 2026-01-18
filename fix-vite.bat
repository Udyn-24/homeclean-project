@echo off
echo Fixing Vite manifest error...
echo.

echo 1. Removing vite references from views...
powershell -Command "(Get-Content 'resources\views\layouts\app.blade.php') -replace '@vite\(\[.*\]\)', '<!-- Bootstrap CSS --><link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\"><link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css\"><script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>' | Set-Content 'resources\views\layouts\app.blade.php'"

powershell -Command "(Get-Content 'resources\views\welcome.blade.php') -replace '@vite\(\[.*\]\)', '' | Set-Content 'resources\views\welcome.blade.php'"

echo 2. Adding Bootstrap CDN to welcome.blade.php...
powershell -Command "(Get-Content 'resources\views\welcome.blade.php') -replace '<head>', '<head><!-- Bootstrap 5 CSS --><link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\"><!-- Bootstrap Icons --><link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css\"><!-- Font Awesome --><link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css\">' | Set-Content 'resources\views\welcome.blade.php'"

powershell -Command "(Get-Content 'resources\views\welcome.blade.php') -replace '</body>', '<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script></body>' | Set-Content 'resources\views\welcome.blade.php'"

echo 3. Fixing other views...
for %%f in (about.blade.php contact.blade.php promo.blade.php service.blade.php create.blade.php) do (
    if exist "resources\views\%%f" (
        powershell -Command "(Get-Content 'resources\views\%%f') -replace '@vite\(\[.*\]\)', '<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\"><link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css\"><script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>' | Set-Content 'resources\views\%%f'"
    )
)

echo.
echo ✅ Done! Vite manifest error should be fixed.
echo.
pause