*** Settings ***
Library  SeleniumLibrary

*** Variables ***
${LOGIN_URL}        http://localhost:8000/login
${POST_CREATE_URL}  http://localhost:8000/post/create
${USERNAME}         numerosada@gmail.com
${PASSWORD}         numerosada123
${NAME MENU_SNACK_URL} http://localhost:8000/post/create
${DESCRIPTION}      ini adalah sosis bakar yang enak dimakan
${PRICE}            2500000
${CATEGORY}         snack

*** Test Cases ***
Login and Create Post
    [Documentation]    Test case untuk login dan menambah post baru
    Open Browser       ${LOGIN_URL}    Firefox
    Maximize Browser Window
    Input Text         id=email    ${USERNAME}
    Input Text         id=password    ${PASSWORD}
    Click Button       xpath=//button[text()='Login']
    Sleep              3s
    Page Should Contain    Logged in successfully
    # Mengakses halaman create post
    Go To              ${POST_CREATE_URL}
    Page Should Contain    Post Page 
    # Mengisi form untuk membuat post baru
    Input Text         id=name    ${NAME}
    Input Text         id=description    ${DESCRIPTION}
    Input Text         id=price    ${PRICE} 
    # Mengunggah thumbnail (gunakan path file yang valid di sistem Anda)
    Choose File        id=thumbnail    /path/to/your/sosis.jpg 
    # Memilih kategori dari dropdown
    Select From List By Label    id=category    ${CATEGORY}
    # Menekan tombol submit untuk membuat post baru
    Click Button       xpath=//button[text()='Submit']
    Sleep              3s
    # Verifikasi bahwa post baru berhasil dibuat
    Page Should Contain    Post created successfully
    Close Browser
