package main

import (
	"fmt"
	"log"
	"net/http"

	"github.com/mutiara/auth/controllers"
	"github.com/mutiara/auth/models"
	"github.com/gorilla/mux"
)

func main() {

	models.ConnectDatabase()
	r := mux.NewRouter()

	r.HandleFunc("/login", controllers.Login).Methods("POST")
	r.HandleFunc("/register", controllers.Register).Methods("POST")
	r.HandleFunc("/logout", controllers.Logout).Methods("POST")
	
 
	fmt.Print("Starting Server localhost:9010")
	// fmt.Println("Starting Server localhost:8082") // Menampilkan pesan bahwa server dimulai di localhost:9010.
	log.Fatal(http.ListenAndServe(":9010", r))

}
