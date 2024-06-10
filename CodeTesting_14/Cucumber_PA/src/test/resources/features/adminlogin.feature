Feature: Login Web
    As a registered admin
    I want to login to the web app
    So I manage my website

    Scenario: Haven't logged in yet
        Given I am on the Login Page
        Then I fill my login info
            | field    | value                |
            | email    | numerosada@gmail.com |
            | password | numerosada123        |
        Then I click the login button
        And the dashboard should be there