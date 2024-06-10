*** Settings ***
Library  SeleniumLibrary

*** Variables ***
${URL}              http://localhost:8000/register
${LOGIN_URL}        http://localhost:8000/login
${MENU_SNACK_URL}   http://localhost:8000/menu/snack
${USERNAME}         vanessa@gmail.com
${PASSWORD}         vanessa

*** Test Cases ***
Login and Access Snack Menu
    [Documentation]    Test case untuk login dan mengakses halaman snack menu
    Open Browser       ${LOGIN_URL}    Firefox
    Maximize Browser Window
    Input Text         id=vanessa@gmail.com    ${USERNAME}
    Input Text         id=vanessa    ${PASSWORD}
    Click Button       xpath=//button[text()='Login']
    Sleep              3s
    Page Should Contain    Logged in successfully
    Go To              ${MENU_SNACK_URL}
    Page Should Contain    Snack Menu

