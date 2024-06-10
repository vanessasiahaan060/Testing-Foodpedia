*** Settings ***
Library  SeleniumLibrary

*** Variables ***
${LOGIN_URL}        http://localhost:8000/login
${POST_URL}         http://localhost:8000/post


${USERNAME}         numerosada@gmail.com
${PASSWORD}         numerosada123

*** Test Cases ***
Login and Access Post Page
    [Documentation]    Test case untuk login dan mengakses halaman post
    Open Browser       ${LOGIN_URL}    Firefox
    Maximize Browser Window
    Input Text         id=email    ${USERNAME}
    Input Text         id=password    ${PASSWORD}
    Click Button       xpath=//button[text()='Login']
    Sleep              3s
    Page Should Contain    Logged in successfully
    Go To              ${POST_URL}
    Page Should Contain    Post Page
    Close Browser
