Feature: Tagged Content
  In order to see projects of a specific type
  As a normal user
  I should see tags on the homepage

  Scenario: User looks at web projects on the homepage
    Given I am on the homepage
    And there are projects
    And I click on "Web"
    Then I should see only "web projects"
