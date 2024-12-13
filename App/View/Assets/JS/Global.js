function Change_Color_Scheme(theme)
{

    document.querySelectorAll("*").forEach(element => {

        element.style.colorScheme = theme;

    });

}

window.onload = function() {

    if(sessionStorage.getItem("theme") === null)
    {

        sessionStorage.setItem("theme", "light");

    }

    else
    {

        const actual_theme = sessionStorage.getItem("theme");

        if(actual_theme === "dark")
        {

            document.querySelector("html").classList.add("dark-theme");

        }

        Change_Color_Scheme(actual_theme);

    }

}

document.getElementById("theme-button").onclick = function() {

    const actual_theme = sessionStorage.getItem("theme");

    if(actual_theme === "dark")
    {

        document.querySelector("html").classList.remove("dark-theme");

        sessionStorage.setItem("theme", "light");

    }

    else
    {

        document.querySelector("html").classList.add("dark-theme");

        sessionStorage.setItem("theme", "dark");

    }

    Change_Color_Scheme(sessionStorage.getItem("theme"));

}

if(document.querySelector("form") !== null)
{

    document.querySelector("form").onsubmit = function(event) {

        let invalid = false;
    
        const inputs = document.querySelectorAll("input");
    
        inputs.forEach(input => {
    
            if(input.id !== "id" && input.value.trim() === "")
            {
    
                invalid = true;
    
            }
    
        });
    
        if(invalid)
        {
    
            event.preventDefault();
    
            alert("Erro! Verifique os campos e tente novamente.");
    
        }
    
    }

}