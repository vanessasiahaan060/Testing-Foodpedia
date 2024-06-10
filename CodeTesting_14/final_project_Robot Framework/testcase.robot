*** Settings ***
Library           SeleniumLibrary
Library           OperatingSystem

*** Variables ***
${URL}              http://localhost:8000/register
${LOGIN_URL}        http://localhost:8000/login
${BASE_URL}         http://localhost:8000
${REGISTER_URL}   ${BASE_URL}/register
${LOGIN_URL}      ${BASE_URL}/login
${NAME}           vanessa siahaan
${EMAIL}          vanessasiahaan@gmail.com
${PASSWORD}       vanessa

*** Test Cases ***
Register New User And Login
    [Documentation]    Test case untuk mendaftarkan dan login dengan pengguna baru
    Open Browser       ${REGISTER_URL}    firefox
    Maximize Browser Window
    Input Text         id=name    ${NAME}
    Input Text         id=email   ${EMAIL}
    Input Text         id=password   ${PASSWORD}
    Input Text         id=confirm_password    ${PASSWORD}
    Click Button       xpath=//button[text()='Register']
    Sleep              3s
    Page Should Contain    Your account has been created
    
    # Setelah mendaftar, lakukan proses login
    Go To              ${LOGIN_URL}
    Input Text         id=email    ${EMAIL} 
    Input Text         id=password    ${PASSWORD}
    Click Button       xpath=//button[text()='Login']
    Sleep              3s
    Page Should Contain    Logged in successfully
    Close Browser
