import io.cucumber.datatable.DataTable;
import io.cucumber.java.en.Given;
import io.cucumber.java.en.Then;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class WebLogin {

    WebDriver browser = new ChromeDriver();

    @Given("I am on the Login Page")
    public void visitThePage() {
        browser.get("http://127.0.0.1:8000/login");
        System.out.println("Hello World");
    }

    @Then("I fill my login info")
    public void iFillMyLoginInfo(DataTable inputs) {
        var UserLoginInfo = inputs.asMap(String.class, String.class);

        browser.findElement(By.id("email")).sendKeys(UserLoginInfo.get("email"));
        browser.findElement(By.id("password")).sendKeys(UserLoginInfo.get("password"));
    }

    @Then("I click the login button")
    public void iClickTheLoginButton() {
        var button = browser.findElement(By.cssSelector("button[type=submit].btn.btn-primary"));
        button.click();
    }

    @Then("the dashboard should be there")
    public void thereTheDashboardShouldBeThere() {
        var dashboardContentContainer = browser.findElement(By.cssSelector("section.content"));
        if(dashboardContentContainer.isDisplayed()){
           System.out.println(dashboardContentContainer.isDisplayed());
        }
    }
}
