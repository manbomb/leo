@echo off
color d

cls

echo.
echo.
echo                       PREPARE IMAGES
echo.
echo.
echo.

python -m pip install numpy

cls

echo.
echo.
echo                       PREPARE IMAGES
echo.
echo.
echo.

python -m pip install opencv-python

cls

echo.
echo.
echo                       PREPARE IMAGES
echo.
echo.	Pressione qualquer tecla para executar o script.
echo.
echo.

pause
cls

python prepare_images.py

echo.
pause
cls

echo.
echo PRESSIONE QUALQUER TECLA PARA SAIR
echo.
pause

cls
color