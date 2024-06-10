import io.cucumber.datatable.DataTable;
import io.cucumber.java.en.Given;
import io.cucumber.java.en.Then;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class SeeReservation {

    WebDriver browser = new ChromeDriver();

    @Given("I visit the Login Page")
    public void VisitTheLoginPage() {
        browser.get("http://127.0.0.1:8000/login");
        System.out.println("Hello World");
    }

    @Then("Do The Login")
    public void DoTheLogin(DataTable inputs) {
        var UserLoginInfo = inputs.asMap(String.class, String.class);

        browser.findElement(By.id("email")).sendKeys(UserLoginInfo.get("email"));
        browser.findElement(By.id("password")).sendKeys(UserLoginInfo.get("password"));

        var button = browser.findElement(By.cssSelector("button[type=submit].btn.btn-primary"));
        button.click();
    }

    @Given("Open the reservation page")
    public void openTheReservationPage() {
        browser.findElement(By.cssSelector("a[href='/reservations']")).click();
    }
}
