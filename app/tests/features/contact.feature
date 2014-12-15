Feature: Contact Form
  In order to send Annie a message
  As a visitor
  I should be able to fill out a contact form

  @javascript
  Scenario: User submits contact form
    Given I am on the homepage
    And I fill out the contact form
    Then I should see "Thanks for your input!"
