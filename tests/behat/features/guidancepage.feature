@guidancepage
Feature: GuidancePage

  As a data.govt.nz user
  I want to see a variety of information about guidnace on data.govt.nz
  So that I can find relevant guidance/content on the site

  Acceptance Criteria:
  - The user can see the title and meta data (quality dimension and audience level)
  - The user can see the learning outcomes
  - The user can filter by quality dimension and audience level
  - The user can see tags/categories and last time the page was updated

  Background:

    Given the "GuidancePage" "Page" has the following data
      | Title | What is open data? |
      | URLSegment | what-is-open-data |
      | Content    | Open data is data that anyone can use and share. |
      | Author  | Cam Findlay |
      | ContactPointName | Cam Findlay |
      | ContactPointEmail  | cam.findlay@dia.govt.nz |
      | Type  | Standard |
    Given the "GuidancePage" "Page2" has the following data
      | Title | What is open data? |
      | URLSegment | what-is-open-data2 |
      | Content    | Open data is data that anyone can use and share. |
      | LearningOutcomes   | Understand the  basic elements required to make open data, open. |
      | Author  | Cam Findlay |
      | ContactPointName | Cam Findlay |
      | ContactPointEmail  | cam.findlay@dia.govt.nz |
      | Type  | Standard |
#    Given I assign the "TaxonomyTerm" "Analysis" to the "Page" "What is open data?"

#    And the "SiteConfig" "data.govt.nz test" has the following data
#      | CkanUrl | https://uat.data.govt.nz/ |

  Scenario: The user can see the learning outcomes associated with the guidance page
    When I go to "what-is-open-data"
    Then I should not see "Learning Outcomes"
    When I go to "what-is-open-data2"
    Then I should see "Learning Outcomes"





