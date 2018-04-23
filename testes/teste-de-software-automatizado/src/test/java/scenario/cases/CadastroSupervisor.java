package scenario.cases;

import java.io.IOException;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

import config.Config;
import test.search;


public class CadastroSupervisor  {
	@SuppressWarnings("deprecation")
	@Test
	public  void main() throws InterruptedException, IOException {
		search.testeCadastroSupervisor();
	}
	
	@Before
	public void inicia(){
		String exePath ="driver//chromedriver.exe";
		System.setProperty("webdriver.chrome.driver",exePath);
	}
	@After
	public void  encerra(){
		Config.driver.quit();
	}

}

