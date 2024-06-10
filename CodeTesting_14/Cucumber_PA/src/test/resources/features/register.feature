Feature: Register an account
  As a user
  I want to register account
  To be able to access features

  Scenario: Haven't logged in yet
    Given I am on the register page
    Then I fill my informations with this details
      | field            | value                |
      | nama             | John Doe             |
      | email            | john@doe.com         |
      | password         | johndoeloveindonesia |
      | confirm_password | johndoeloveindonesia |
    Then I click the signup button
    Then I Log In to the website
      | field            | value                |
      | nama             | John Doe             |
      | email            | john@doe.com         |
      | password         | johndoeloveindonesia |
      | confirm_password | johndoeloveindonesia |
    Then the user will open the homepage