Feature: Add Menu
  As an admin, I want to log to the system
  and adding a new menu item

  Scenario: Haven't logged in yet
    Given I open the Login Page
    Then Fill my login info
      | field    | value                |
      | email    | numerosada@gmail.com |
      | password | numerosada123        |
    Then Click at the login button
    Then Open the menu page
    Then Open add menu page
    Then fill the new menu informations