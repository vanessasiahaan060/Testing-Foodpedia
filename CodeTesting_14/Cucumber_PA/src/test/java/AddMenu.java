import io.cucumber.datatable.DataTable;
import io.cucumber.java.en.Given;
import io.cucumber.java.en.Then;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class AddMenu {

    WebDriver browser = new ChromeDriver();

    @Given("I open the Login Page")
    public void IOpenTheLoginPage() {
        browser.get("http://127.0.0.1:8000/login");
        System.out.println("Hello World");
    }

    @Then("Fill my login info")
    public void FillMyLoginInfo(DataTable inputs) {
        var UserLoginInfo = inputs.asMap(String.class, String.class);

        browser.findElement(By.id("email")).sendKeys(UserLoginInfo.get("email"));
        browser.findElement(By.id("password")).sendKeys(UserLoginInfo.get("password"));
    }

    @Given("Open the menu page")
    public void visitThePage() {
        browser.get("http://127.0.0.1:8000/post");
    }

    @Then("Click at the login button")
    public void clickAtTheLoginButton() {
        var button = browser.findElement(By.cssSelector("button[type=submit].btn.btn-primary"));
        button.click();
    }

    @Then("Open add menu page")
    public void openAddMenuPage() {
        var button = browser.findElement(By.cssSelector("body > div > div.content-wrapper > section.content > div > div.card-body > a"));
        button.click();
    }

    @Then("fill the new menu informations")
    public void fillTheNewMenuInformations(DataTable inputs) {
        var nameForm = browser.findElement(By.cssSelector("input[name=\"nama\"].form-control"));
        nameForm.sendKeys("Batu Goreng");
        var deskripsiForm = browser.findElement(By.cssSelector("input[name=\"nama\"].form-control"));
        deskripsiForm.sendKeys("Batu Goreng sangat nikmat");
        var hargaForm = browser.findElement(By.cssSelector("input[name=\"price\"].form-control"));
        hargaForm.sendKeys("45000");    }
}
