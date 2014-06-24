#!/bin/bash

cd "$(dirname "$0")"

sudo npm install

echo "Please select which tasks Ground should run"

PS3='Choose the task number and hit enter:'

options=(
	"Run Dev task"
	"Run Deploy task"
	"Quit"
)

select opt in "${options[@]}"

do
	case $opt in
		"Run Dev task")
			grunt;;
		"Run Deploy task")
			grunt deploy;;
		 "Quit")
			exit;;
		*) echo Invalid option;;
	esac
done
