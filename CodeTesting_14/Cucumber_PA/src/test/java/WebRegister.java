import io.cucumber.datatable.DataTable;
import io.cucumber.java.en.Given;
import io.cucumber.java.en.Then;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class WebRegister {

    WebDriver browser = new ChromeDriver();

    @Given("I am on the register page")
    public void IamOnTheSignUpPage() throws Throwable {
        browser.get("http://localhost:8000/register");
    }

    @Then("I fill my informations with this details")
    public void iFillMyInformationsWithThisDetails(DataTable signUpInfo) {
        var fetchedSignupInfo = signUpInfo.asMap(String.class, String.class);

        var getUsernameField = browser.findElement(By.cssSelector("input#name.form-control"));
        getUsernameField.sendKeys(fetchedSignupInfo.get("nama"));

        var getEmailField = browser.findElement(By.cssSelector("input#email.form-control"));
        getEmailField.sendKeys(fetchedSignupInfo.get("email"));

        var getPasswordField = browser.findElement(By.cssSelector("input#password.form-control"));
        getPasswordField.sendKeys(fetchedSignupInfo.get("password"));

        var getConfirmPasswordField = browser.findElement(By.cssSelector("input#password_confirmation.form-control"));
        getConfirmPasswordField.sendKeys(fetchedSignupInfo.get("confirm_password"));
    }

    @Then("I click the signup button")
    public void iClickTheSignupButton() {
        var button = browser.findElement(By.cssSelector("button[type=submit]"));
        button.click();
    }


    @Then("I Log In to the website")
    public void iLogInToTheWebsite(DataTable signUpInfo) {
        var fetchedSignupInfo = signUpInfo.asMap(String.class, String.class);

        var getEmailField = browser.findElement(By.id("email"));
        getEmailField.sendKeys(fetchedSignupInfo.get("email"));
        var getPasswordField = browser.findElement(By.id("password"));
        getPasswordField.sendKeys(fetchedSignupInfo.get("password"));

        var button = browser.findElement(By.cssSelector("button[type=submit]"));
        button.click();
    }

    @Then("the user will open the homepage")
    public void theUserWillOpenTheHomepage() throws Exception {
        browser.findElement(By.cssSelector("h1.display-3.font-weight-bold.text-white")).isDisplayed();
    }
}