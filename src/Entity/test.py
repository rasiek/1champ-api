from enum import Enum
import math
import uuid


class Pool:

    def __init__(self, tournament, teamsQty, roundNum, poolNum) -> None:
        self.id = uuid.uuid4()
        self.teams = []
        self.tournament = tournament
        self.teamsQty = teamsQty
        self.roundNum = roundNum
        self.poolNum = poolNum

    def addTeam(self, team):
        self.teams.append(team)


class Tournament:

    DEFAULT_TEAM_BY_POOL = 2

    def __init__(self, teams, rounds=2, poolQty=2, firstRoundQuali=1) -> None:
        self.id = uuid.uuid4()
        self.teams = [f'Team {x}' for x in range(1, teams+1)]
        self.poolQty = poolQty
        self.rounds = rounds
        self.firstRoundQuali = firstRoundQuali
        self.poolsQtys = []

        self.rounds_creation()

    def rounds_creation(self):

        lastRoundQuali = None
        lastRoundTeamsQty = None
        nextRoundTeamsQty = None
        nextRoundPoolQty = None
        lastRoundPoolQty = None
        nextRoundQuali = 1
        finalRound = False

        for round in range(self.rounds):

            if round == self.rounds - 1:
                finalRound = True

            if finalRound:

                nextRoundPoolQty = 1
                nextRoundQuali = 1

            if round == 0:
                self.__round_fixture(self.teams, self.poolQty, round)

                nextRoundTeamsQty = self.firstRoundQuali * self.poolQty

                nextRoundPoolQty = int(
                    nextRoundTeamsQty / Tournament.DEFAULT_TEAM_BY_POOL)
                lastRoundQuali = self.firstRoundQuali
                lastRoundPoolQty = self.poolQty

                print(
                    f"---------------- ROUND No. {round + 1} FINISHED--------------")

            else:

                roundTeams = [f"Team No.{team + 1} of pool No.{pool + 1}" for team in range(
                    lastRoundQuali) for pool in range(lastRoundPoolQty)]

                # for team in range (lastRoundQuali):

                #     for pool in range(lastRoundPoolQty):
                #         roundTeams. append(f"Team No.{team + 1} of pool No.{pool + 1}")

                self.__round_fixture(roundTeams, nextRoundPoolQty, round)

                nextRoundTeamsQty = nextRoundQuali * nextRoundPoolQty
                lastRoundPoolQty = nextRoundPoolQty
                lastRoundQuali = nextRoundQuali
                nextRoundPoolQty = int(
                    nextRoundTeamsQty / Tournament.DEFAULT_TEAM_BY_POOL)

                print(
                    f"---------------- ROUND No. {round + 1} FINISHED--------------")

            # if nextRoundTeamsQty <= 8 or round >= self.rounds - 3:
            #     nextRoundQuali = 1
            # else:
            #     nextRoundQuali = self.firstRoundQuali

    def __round_fixture(self, teams, poolQty, roundNumber):

        pollsRows = []
        rowsQty = math.ceil(len(teams) / poolQty)
        pools = []
        poolNumber = 1

        for x in range(rowsQty):

            SLICE_CONST = poolQty * x

            row = teams[SLICE_CONST:SLICE_CONST + poolQty]

            if x % 2 != 0:
                row.reverse()
                pollsRows.append(row)

            else:
                if x == rowsQty - 1:
                    row.reverse()
                pollsRows.append(row)

        for _ in range(poolQty):

            pool = Pool(self.id, len(self.teams), roundNumber, poolNumber)

            for team in pollsRows:
                try:
                    pool.addTeam(team.pop(-1))
                except:
                    print(f'no more team for pool {poolNumber}')

            pools.insert(0, pool)

            poolNumber += 1

        # print(len(pools))
        for pool in pools:
            print(pool.teams)


class Round(Enum):
    FINAL = 1
    SEMIFINAL = 2
    QUARTS = 4


tour = Tournament(teams=24, poolQty=4, rounds=4, firstRoundQuali=2)
