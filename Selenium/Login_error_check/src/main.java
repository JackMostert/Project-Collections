import java.util.concurrent.TimeUnit;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		String[] emails = {"TEST@TEST.COM", "j_mostert@outlook.co.uk", "j_mostert@outlook.com", "test@test.co", "test@test.com"};
		String[] passwords = {"dsfs", "j232", "abc", "463o", "abc"};
		
		System.setProperty("webdriver.chrome.driver", "C:\\xampp\\htdocs\\mygithub\\Project-Collections\\Selenium\\chromedriver.exe");
		WebDriver driver = new ChromeDriver();
		//  Wait For Page To Load
		// Put a Implicit wait, this means that any search for elements on the page
		// could take the time the implicit wait is set for before throwing exception 
		driver.get("http://localhost/mygithub/Project-Collections/php/security/login/normal/");
		driver.manage().window().maximize();
		driver.manage().timeouts().implicitlyWait(1, TimeUnit.SECONDS);
		
		int index = 0;
		int firstIndex;
		boolean status[] = {false, false, false, false, false};
		
		do {
			firstIndex = checkLogin(driver, emails[index], passwords[index]).indexOf('E');
			if (firstIndex == 0) {
				
			} else {
				status[index] = true;
			}
			index ++;
		} while (firstIndex == 0);
		
		for (int i = 0; i < 5; i++) {
			System.out.print(status[i]);
			System.out.print(" - ");
		}
	}
	
	public static String checkLogin(WebDriver driver, String email, String password) {
		driver.findElement(By.id("email")).sendKeys(email);
		driver.findElement(By.id("password")).sendKeys(password);
		driver.findElement(By.id("submit")).click();
		
		driver.manage().timeouts().implicitlyWait(1, TimeUnit.SECONDS);
		String webMessage = driver.findElement(By.id("messageText")).getText();
		return webMessage;
	}

}
