*** Settings ***
Library  SeleniumLibrary

*** Variables ***
${URL}              http://localhost:8000/register
${NAME}             vanessa siahaan
${EMAIL}            vanessasiahaan@gmail.com
${PASSWORD}         yourpassword

*** Test Cases ***
Register New User
    [Documentation]    Test case untuk mendaftarkan pengguna baru
    Open Browser       ${URL}    Firefox
    Maximize Browser Window
    Input Text         id=name    ${NAME}
    Input Text         id=email    ${EMAIL}
    Input Text         id=password    ${PASSWORD}
    Input Text         id=confirm_password    ${PASSWORD}
    Click Button       xpath=//button[text()='Register']
    Sleep              3s
    Page Should Contain    Your account has been created
    Close Browser
