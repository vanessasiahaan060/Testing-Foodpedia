Feature: Add Menu
  As an admin, I want to log to the system
  and adding a new menu item

  Scenario: Haven't logged in yet
    Given I visit the Login Page
    Then Do The Login
      | field    | value                |
      | email    | numerosada@gmail.com |
      | password | numerosada123        |
    Then Open the reservation page
